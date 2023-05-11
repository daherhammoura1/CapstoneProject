<?php

namespace App\Http\Controllers;

use App\Models\ClaimStatus;
use App\Models\HospitalInfo;
use Illuminate\Http\Request;

class ClaimStatusController extends Controller
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
        $claimStatus = ClaimStatus::all();
        $hospital = HospitalInfo::all();
        return view('pages.admin.claimstatus.list')->with('claimStatus', $claimStatus)->with('hospital', $hospital);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.claimstatus.create');
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
        ClaimStatus::create($request->post());

        return redirect()->route('claim_status.index')->with('success', 'Claim Status has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClaimStatus $claimStatus)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClaimStatus $claimStatus)
    {
        //
        return view('pages.admin.claimStatus.create')->with('claimStatus', $claimStatus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClaimStatus $claimStatus)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        $claimStatus->update($request->post());
        return redirect()->route('claim_status.index')->with('success', 'Claim Status has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteStatus($id)
    {
        $claimStatus = ClaimStatus::find($id);
        $claimStatus->delete();
        return redirect()->route('claim_status.index')->with('success', 'Claim Status has been deleted successfully.');
    }
}
