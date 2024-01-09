<?php

namespace App\Traits ;

use App\Events\LoginEvent;
use Illuminate\Http\Request;

trait LoggingTrait {

    protected function authenticated(Request $request, $user)
    {
event(new LoginEvent($user->name,$user->email));
    }

}
