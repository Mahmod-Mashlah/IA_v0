<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\LoginEvent;
use App\Traits\LoggingTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebAuthController extends Controller
{
    use LoggingTrait;
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


        // Attempt to log in the user
        if (auth()->attempt($credentials )) {

            $user = User::where('email', $request->email)->first();

            event(new LoginEvent($user->name,$user->email));

            return redirect()->route('groups');

        }

        // Authentication failed, redirect back to login form with error message
    //    $loginFailed=  Alert::success('Login Failed !', 'You must enter correct Username and password ');
        return redirect()->route('login',
        // compact('loginFailed',)
        )
        ->withErrors(['loginFailedMessage' => 'Invalid credentials']);
    }
}
