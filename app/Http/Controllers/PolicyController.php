<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\PolicyStatus;
use App\Models\PolicyType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\CustomIdGenerator;
use App\Models\Role;
use Illuminate\Console\View\Components\Alert;

class PolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole:ADMIN|USER');
    }


    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //

        $policies = Policy::all();
        return view('pages.admin.policies.list')->with('policies', $policies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $clientRole = Role::where('name', 'USER')->first();
        $users = User::where('role_id', $clientRole->id)->pluck('name', 'id');
        $policyStatus = PolicyStatus::pluck('name', 'id');
        $policyType = PolicyType::pluck('name', 'id');
        return view('pages.admin.policies.create')->with('users', $users)->with('policyStatus', $policyStatus)->with('policyType', $policyType);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'policynumber' => 'required',
            'policy_creation_date' => 'required',
            'policy_expiry_date' => 'required',
            'policy_status_id' => 'required',
            'policy_type_id' => 'required',
            'user_id' => 'required',
            'discount' => 'required',
        ]);

        Policy::create($request->all());
        return redirect()->route('policies.index')
            ->with('status', 'Policy created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Policy $policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Policy $policy)
    {
        //
        $clientRole = Role::where('name', 'USER')->first();
        $users = User::where('role_id', $clientRole->id)->pluck('name', 'id');
        $policyStatus = PolicyStatus::pluck('name', 'id');
        $policyType = PolicyType::pluck('name', 'id');
        return view('pages.admin.policies.create')->with('users', $users)
            ->with('policyStatus', $policyStatus)
            ->with('policyType', $policyType)
            ->with('policy', $policy);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Policy $policy)
    {
        //
        $request->validate([
            'policynumber' => 'required',
            'policy_creation_date' => 'required',
            'policy_expiry_date' => 'required',
            'policy_status_id' => 'required',
            'policy_type_id' => 'required',
            'user_id' => 'required',
            'discount' => 'required',
        ]);

        $policy->update($request->all());
        return redirect()->route('policies.index')
            ->with('status', 'Policy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletePolicy($id)
    {
        //
        $policy = Policy::find($id);
        $policy->delete();
        return redirect()->route('policy.index')
            ->with('status', 'Policy  deleted successfully');
    }
}
