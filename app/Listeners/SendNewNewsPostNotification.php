<?php

namespace App\Listeners;

use App\Events\NewNewsPostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewNewsPostNotification
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
    // public function handle(NewNewsPostNotification $event): void
    // {
    //     //
    // }

    public function handle(NewNewsPostNotification $event)
    {
        // Logic to send the notification using your chosen notification service (e.g., Pusher, FCM, etc.)
        // Example: Send a Pusher notification
        // Pusher::trigger('news-channel', 'news-posted', ['message' => $event->message]);
        $message = $event->message;
        echo "<script>console.log('New News Post Notification: $message');</script>";
    }
}
