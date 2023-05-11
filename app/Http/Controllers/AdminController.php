<?php

namespace App\Http\Controllers;

use App\Models\ClientInfo;
use App\Models\HospitalInfo;
use App\Models\ClaimStatus;
use App\Models\Claim;
use App\Models\Policy;
use App\Models\PolicyStatus;
use App\Models\PolicyType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole:ADMIN');
    }


    public function dashboard()
    {
        $claims = Claim::all();
        $polcies = Policy::all()->count();
        $clients = ClientInfo::all()->count();
        $hospital = HospitalInfo::all()->count();
        $pendingStatus = ClaimStatus::where('name', 'Pending')->first();
        $pedning = $claims->where('status_id', $pendingStatus->id)->count();
        $claims = $claims->count();
        $claim = Claim::orderBy('created_at', 'desc')->take(10)->get();
        $policy_type = PolicyType::all()->count();
        return view('pages.admin.dashboard.dashboard')->with('clients', $clients)->with('hospital', $hospital)->with('claims', $claims)->with('pedning', $pedning)->with('polcies', $polcies)
            ->with('policy_type', $policy_type)->with('claim', $claim);
    }

    public function endOfDay()
    {
        $policy = Policy::whereDate('policy_expiry_date', '<', Carbon::today())->get();
        $expiredStatus = PolicyStatus::where('name', 'Inactive')->first();
        foreach ($policy as $p) {
            $p->policy_status_id = $expiredStatus->id;
            $p->save();
        }
        return redirect('policies');
    }
}
