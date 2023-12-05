<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WebAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        // Validate the login form data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        $user = User::get()
                    ->where('email', $request->email)
                    ->first()
                    ;
        $userID = $user->id ;


        $admin = User::get()
                    ->whereBetween('id',['1', '101'])
                    ->first()
                    ;
        $adminID = $admin->id ;

        // Attempt to log in the user
        if (auth()->attempt($credentials )) {
            return redirect('/groups_index.blade');

        }

        // Authentication failed, redirect back to login form with error message
    //    $loginFailed=  Alert::success('Login Failed !', 'You must enter correct Username and password ');
        return redirect()->route('login',
        // compact('loginFailed',)
        )
        ->withErrors(['loginFailedMessage' => 'Invalid credentials']);
    }
}
