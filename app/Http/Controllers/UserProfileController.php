<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\ClientInfo;
use App\Models\HospitalInfo;
use App\Models\Policy;
use App\Models\PolicyStatus;
use App\Models\PolicyType;
use App\Models\Role;
use App\Models\User;
use App\Models\ClaimStatus;
use Illuminate\Http\Request;
use Auth;
use PhpParser\Node\Stmt\Case_;



class UserProfileController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole:USER');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $user = User::where('id', auth()->user()->id)->first();
        return view('pages.User.profile.info')->with('user', $user);
    }
    public function indexDashboard()
    {
        //  

        $clients = ClientInfo::where('user_id', Auth::user()->id)->first();
        $policy = Policy::where('user_id', $clients->user_id)->pluck('id');
        $policy1 = Policy::where('user_id', $clients->user_id)->count();
        //////////////////////////////////////////////////////////////
        $claim_Status_id = ClaimStatus::where('name', 'Pending')->first();


        $pending = Claim::whereIn('policy_id', $policy)->where('status_id', $claim_Status_id->id)->count();


        return view('pages.User.dashboard.dashboard')->with('policy1', $policy1)->with('pending', $pending);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //not  ethical to edit user

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
