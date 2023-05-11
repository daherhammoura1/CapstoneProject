<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\ClaimStatus;
use App\Models\HospitalInfo;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole:ADMIN');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $claim = Claim::all();
        return view('pages.admin.claim.list')->with('claim', $claim);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function edit(Claim $claim)
    {
        //

        $policy = Policy::pluck('policynumber', 'id');
        $claim_status = ClaimStatus::pluck('name', 'id');
        return view('pages.admin.claim.create')->with('claim', $claim)->with('policy', $policy)->with('claim_status', $claim_status);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Claim $claim)
    {


        $request->validate([
            'statement' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        $input['hospital_id'] = auth::user()->id;
        $input['claim_status_id'] = ClaimStatus::where('name', 'Pending')->first()->id;
        $claim->update($request->post());
        return redirect()->route('claim.index')->with('success', 'Claim has been updated successfully.');
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Claim $claim)
    {
        //
    }

    public function deleteClaim($id)
    {
        //
        $claim = Claim::find($id);
        $claim->delete();
        return redirect()->route('claim.index')->with('success', 'Claim has been deleted successfully.');
    }
}
