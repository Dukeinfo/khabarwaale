<?php

namespace App\Livewire\Frontend\Homepage\Subscribe;

use App\Models\Subscription;
use App\Models\VideoGallery;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SubscribeForm extends Component
{
    use LivewireAlert;
 public $email;
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
            'email' => 'required|email|unique:subscriptions',
        ]);

        Subscription::create([
            'email' => $this->email,
            'ip' => getUserIp(),
            'status' => 'subscribed',
        ]);

        // Send a confirmation email
        session()->flash('success', 'Subscribed successfully!');
        $this->alert('success', 'Subscribed successfully!!');

    }
}
