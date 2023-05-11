<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\ClientInfo;
use Auth;
use Illuminate\Support\Facades\Hash;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout()
    {
        Auth::logout();
        //$request->session()->invalidate();
        //$request->session()->regenerateToken();
        return redirect('login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('login');
        }

        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            // log them in
            auth()->login($existingUser, true);
        } else {
            $role = Role::where('name', 'USER')->first();
            // create a new user
            $newUser                  = new User();
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->password        =  Hash::make('12345678');
            $newUser->role_id = $role->id;

            // $newUser->google_id       = $user->id;
            // $newUser->avatar          = $user->avatar;
            // $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            return view('auth.SocialiteRegister', compact('newUser'));
        }
        return redirect()->route('user_profile.index');
    }

    public function redirectTo()
    {
        $role = Auth::user()->role->name;
        switch ($role) {
            case 'ADMIN':
                return '/';
                break;
            case 'HOSPITAL':
                return '/hospital-claim-list';
                break;
            case 'USER':
                return '/user_profile';
                break;
        }
    }
}
