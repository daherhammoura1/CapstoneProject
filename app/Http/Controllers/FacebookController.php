<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Validator;

use Laravel\Socialite\Facades\Socialite;
use Exception;
use Auth;


class FacebookController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {

        $user = Socialite::driver('facebook')->user();
        $isUser = User::where('fb_id', $user->id)->first();
        $role = Role::where('name', 'USER')->first();

        if ($isUser) {
            Auth::login($isUser);
            return redirect('user_profile');
        } else {

            $role = Role::where('name', 'USER')->first();
            // create a new user
            $newUser                  = new User();
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->password        =  Hash::make('12345678');
            $newUser->role_id = $role->id;
            $newUser->fb_id = $user->id;


            $newUser->save();
            return view('auth.SocialiteRegister', compact('newUser'));
        }
        return redirect()->route('user_profile.index');
    }
}
