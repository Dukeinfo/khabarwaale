<?php

namespace App\Livewire\Frontend\Homepage\Tv;

use App\Models\VideoGallery;
use Livewire\Component;

class LiveTv extends Component
{
    public function render()
    {

              $today = now()->toDateString();
              $livetvnews = VideoGallery::orderBy('created_at', 'desc') 
                                        ->where('status', 'Active')
                                        ->whereNull('deleted_at')
                                        ->first();
             
        return view('livewire.frontend.homepage.tv.live-tv' ,['livetvnews' =>$livetvnews]);
    }
}
