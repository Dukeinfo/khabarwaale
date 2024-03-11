<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Logout;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Request; 

class LogSuccessfulLogout
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
    // public function handle(object $event): void
    // {
    //     //
    // }
    public function handle(Logout $event)
    {

          $user = $event->user;
          $ipAddress = Request::ip();

          $loginTime = session('login_time');
            if ($loginTime) {
            // Calculate the session duration
            $logoutTime = now();

            $sessionDuration = $logoutTime->diffInSeconds($loginTime);
            

            $sessionDuration = $this->formatDuration($sessionDuration);

            
            // Log the session duration or store it in the database
            logActivity(
                'User',
                $user,
                [
                    'User ID' => $user->id,
                    'Email' => $user->email,
                    'Name' => $user->name,
                    'IP Address' => $ipAddress,
                    'Duration_seconds' => $sessionDuration,
                ],
                'Logout',
                'User Logout'
            );

    }
}

    private function formatDuration($seconds)
    {
        $hours = floor($seconds / 3600); // Calculate hours
        $minutes = floor(($seconds / 60) % 60); // Calculate remaining minutes
        $seconds = $seconds % 60; // Calculate remaining seconds

        // Construct the human-readable duration string
        $durationString = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

        return $durationString;
    }


}
