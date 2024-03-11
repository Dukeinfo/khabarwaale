<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request; 
class LogSuccessfulLogin
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
    public function handle(Login  $event)
    {
        //
        session(['login_time' => now()]);
        $user = $event->user;

               // Get user IP address
               $ipAddress = Request::ip();

               // Get current timestamp
               $timestamp = now();
               // Human-readable time format
                $humanReadableTime = $timestamp->format('Y-m-d H:i:s');
        // Log user login activity
        logActivity(
            'User',
            $user,
            [
                'User ID' => $user->id,
                'Email' => $user->email,
                'Name' => $user->name,
                'IP Address' => $ipAddress,
                'Login Time' =>  $humanReadableTime,
                // Add more user information as needed
            ],
            'Login',
            'User logged in'
        );
    }
}
