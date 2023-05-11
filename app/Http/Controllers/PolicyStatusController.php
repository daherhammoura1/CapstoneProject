<?php

namespace App\Http\Controllers;

use App\Models\PolicyStatus;
use Illuminate\Http\Request;

class PolicyStatusController extends Controller
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
        $policyStatus = PolicyStatus::all();
        return view('pages.admin.policyStatus.list')->with('policyStatus', $policyStatus);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.policyStatus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        policyStatus::create($request->post());
        return redirect()->route('policy_status.index')->with('success', 'Policy Status has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PolicyStatus $policyStatus)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PolicyStatus $policyStatus)
    {
        //

        return view('pages.admin.policyStatus.create')->with('policyStatus', $policyStatus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PolicyStatus $policyStatus)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        $policyStatus->update($request->post());
        return redirect()->route('policy_status.index')->with('success', 'Policy Status has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteStatus($id)
    {
        //
        $policyStatus = PolicyStatus::find($id);
        $policyStatus->delete();
        return redirect()->route('policy_status.index')->with('success', 'Policy Status has been deleted successfully.');
    }
}
