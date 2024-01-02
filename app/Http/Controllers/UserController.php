<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('users.index', compact(['users']));
    }

    public function user_checks_in_report(Request $request)
    {
        $user = User::find($request->user_id);
        $user_Actions = Action::all()->where('user_id',$request->user_id);
        return view('users.show-user-actions', compact(['user_Actions','user']));
    }

}
