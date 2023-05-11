<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\ClaimStatus;
use App\Models\HospitalInfo;
use App\Models\Policy;
use App\Models\PolicyStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole:HOSPITAL');
    }

    public function index()
    {
        //
        $claim = Claim::where('hospital_id', Auth::user()->id)->get();
        return view('pages.Hospital.claim.list')->with('claim', $claim);
    }
    public function profile()
    {
        //
        $claim = Claim::where('hospital_id', Auth::user()->id)->get();
        return view('pages.Hospital.profile.info')->with('claim', $claim);
    }

    public function update(Request $request, HospitalInfo $hospitalInfo)
    {
        //
        $request->validate([
            'hospital_name' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'reg_number' => 'required',

        ]);
        $hospitalInfo->update($request->all());

        return redirect()->route('hospital-profile')
            ->with('status', 'Info updated successfully.');
    }



    public function create()
    {
        //

        $policy = Policy::pluck('policynumber', 'id');

        return view('pages.Hospital.claim.create')
            ->with('policy', $policy);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'statement' => 'required',
            'policy_id' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        $input['hospital_id'] = auth::user()->id;
        $input['status_id'] = ClaimStatus::where('name', 'Pending')->first()->id;
        $policyActive = PolicyStatus::where('name', 'Active')->first();
        $checkingValidity = Policy::where('id', $input['policy_id'])->where('policy_status_id', $policyActive->id)->first();
        if (!$checkingValidity) {
            return redirect()->route('hospital-claim')->with('error', 'Policy is not active.');
        }
        Claim::create($input);
        return redirect()->route('hospital-claim-list')->with('success', 'Claim has been created successfully.');
    }
    public function indexHospitalDashboard()
    {
        $claims_count = Claim::where('hospital_id', auth::user()->id)->count();
        $claims = Claim::where('hospital_id', auth::user()->id)->first();
        $pendingStatus = ClaimStatus::where('name', 'Pending')->first();

        $pedning = $claims->where('status_id', $pendingStatus->id)->count();

        ///////////////////////////////////////////////////////////////////////////////////////////
        $policies = Policy::all()->count();

        $claims = Claim::where('hospital_id', auth::user()->id)->first();

        $policyid = Policy::where('id', $claims->policy_id)->first();
        $hospital_Policies = $claims->where('policy_id', $policyid->id)->count();

        ////////////////////////////////how many policies mlankin to that hospital  ////////////////////////////////////////////



        return view('pages.Hospital.dashboard.dashboard')->with('claims_count', $claims_count)->with('claims_pending',  $pedning)
            ->with('hospital_Policies', $hospital_Policies)
            ->with('policies', $policies);
    }
}
