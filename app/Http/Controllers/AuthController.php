<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $request -> validated($request->all() );

        if (!Auth::attempt($request->only(['email','password']))) {
            return $this->error('','Credentials dont match (Unauthorized)',401);
        }

        $user = User::where('email',$request->email)->first();

        return $this->success([
            'user' => $user,
            'token'=> $user->createToken('API Token of'.$user->name)->plainTextToken
        ]);


    }

    public function register(StoreUserRequest $request)
    {
        $request -> validated($request->all() );

        $user = User::create([

            'name' => $request -> name ,
            'email' => $request -> email ,
            'password' => Hash::make($request -> password) ,
            'birthdate' => $request -> birthdate ,
            'serial_number' => $request -> serial_number ,
            'phone_number' => $request -> phone_number ,
            'address' => $request -> address ,

        ]);

        $user->addRole('user');

        $role = DB::table('role_user')
                    ->where('user_id', $user->id)
                    ->first()
                    ->role_id
                    ;
        $roleName = DB::table('roles')
                    ->where('id', $role)
                    ->first()
                    ->name
                    ;



        return $this -> success([
            'user' => $user,
            'role' => $role,
            'role-name' => $roleName,
            'token'=> $user->createToken('API Token of ' .$user->name)->plainTextToken ,
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this -> success([
            'message' => 'You have successfuly logged out and your token has been deleted',
        ]);
    }
}
