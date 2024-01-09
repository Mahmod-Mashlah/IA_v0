<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\LoginEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */


     // Add Login Event
     public function handle(LoginEvent $event): void
    {
        //
        $time = Carbon::now()->toDateTimeString();
        $username = $event->username;
        $email = $event->email;
        DB::table('loggings')->insert([
            'name' => $username,
            'email' => $email,
            'created_at' => $time,
            'updated_at' => $time,
        ]);
    }
}
