<?php

namespace App\Livewire\Frontend\Homepage\Subscribe;

use App\Mail\Websitemail;
use App\Models\Subscription;
use App\Models\VideoGallery;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SubscribeForm extends Component
{
    use LivewireAlert;
    public $email;
    public $message;
    public function render()
    {
        $rightlivetvnews = VideoGallery::orderBy('created_at', 'desc') 
        ->where('status', 'Active')
        ->whereNull('deleted_at')
        ->first();
        return view('livewire.frontend.homepage.subscribe.subscribe-form' ,['rightlivetvnews' => $rightlivetvnews ]);
    }


    public function subscribe()
    {
       
            $this->validate([
                'email' => 'required|email|unique:subscriptions,email',
            ]);
            try {
            $token = hash('sha256', time());

            $subscriber = new Subscription();
            $subscriber->email = $this->email;
            $subscriber->token = $token;
            $subscriber->status = 'Pending';
            $subscriber->ip = getUserIp();

            if ($subscriber->save()) {
                $subject = 'Please Confirm Subscription';
                $verification_link = url('subscriber/verify/' . $token . '/' . $this->email);
                $message = 'Please click on the following link in order to verify as a subscriber:<br><br>';
                $message .= '<a href="' . $verification_link . '">' .'Verify Email Address '. '</a><br><br>';
                $message .= 'If you received this email by mistake, simply delete it. You will not be subscribed if you do not click the confirmation link above.';
                Mail::to($this->email)->send(new Websitemail($subject, $message));
                session()->flash('success', 'Thanks, please check your inbox to confirm the subscription');
            } else {
                session()->flash('error', 'Something went wrong, please try again.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the subscription process
            session()->flash('error', 'An error occurred. Please try again later.');
            // You can log the error for debugging purposes if needed
            Log::error($e);
        }
               

    }
}
