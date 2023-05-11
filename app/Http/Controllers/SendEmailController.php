<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\NotifyMail;
use App\Models\User;

class SendEmailController extends Controller
{
    //
    public function index()
    {

        $user = User::where('email', auth()->user()->email)->first();
        Mail::to($user)->send(new NotifyMail());


        return redirect()->route('user_profile.index');
    }
}
