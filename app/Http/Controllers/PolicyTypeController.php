<?php

namespace App\Http\Controllers;

use App\Models\PolicyType;
use Illuminate\Http\Request;

class PolicyTypeController extends Controller
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
        $policytype = PolicyType::all();
        return view('pages.admin.policyType.list')->with('policytype', $policytype);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.admin.policyType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        PolicyType::create($request->all());
        return redirect()->route('policy_type.index')
            ->with('status', 'Policy Type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PolicyType $policyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PolicyType $policyType)

    {

        return view('pages.admin.policyType.create')->with('policyType', $policyType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PolicyType $policyType)
    {
        //
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $policyType->update($request->all());
        return redirect()->route('policy_type.index')
            ->with('status', 'Policy Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function deleteType($id)
    {
        $policyType = PolicyType::find($id);
        $policyType->delete();
        return redirect()->route('policy_type.index')
            ->with('status', 'Policy Type deleted successfully');
    }
}
