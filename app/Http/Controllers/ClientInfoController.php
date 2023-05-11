<?php

namespace App\Http\Controllers;

use App\Models\ClientInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\NotifyMail;


class ClientInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
        ]);

        ClientInfo::create($request->all());
        // $userinfo= ClientInfo::create($request->all());
        // $user = $userinfo->user;
        $user = User::find(request('user_id'));
        auth()->login($user, true);


        return redirect()->route('send-email');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientInfo $clientInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientInfo $clientInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientInfo $clientInfo)
    {
        //
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',



        ]);

        $clientInfo->update($request->all());
        return redirect()->route('user_profile.index')
            ->with('status', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientInfo $clientInfo)
    {
        //
    }
}
