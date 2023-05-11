<?php

namespace App\Http\Controllers;

use App\Models\ClientInfo;
use App\Models\HospitalInfo;
use App\Models\PolicyType;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Case_;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller

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

        $user = User::all();
        return view('pages.admin.user.list')->with('user', $user);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $roles = Role::pluck('name', 'id');
        return view('pages.admin.user.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        $request['password'] = bcrypt($request['password']);
        $role = Role::find($request->role_id);
        switch ($role['name']) {
            case 'HOSPITAL':
                $request->validate([
                    'hospital_name' => 'required',
                    'location' => 'required',
                    'reg_number' => 'required',
                    'phone' => 'required|unique:hospital_infos',

                ]);
                $user = User::create($request->all());
                $request['user_id'] = $user->id;
                HospitalInfo::create($request->all());
                break;
            case 'USER':
                $request->validate([
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'mobile' => 'required|unique:client_infos',
                    'dob' => 'required',
                    'address' => 'required',
                    'zip' => 'required',
                ]);
                $user = User::create($request->all());
                $request['user_id'] = $user->id;
                ClientInfo::create($request->all());
                break;

            case 'ADMIN':
                $user = User::create($request->all());
                break;
        }
        return redirect()->route('user.index');
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
