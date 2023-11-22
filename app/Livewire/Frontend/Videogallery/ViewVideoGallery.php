<?php

namespace App\Livewire\Frontend\Videogallery;

use App\Models\VideoGallery;
use Livewire\Component;

class ViewVideoGallery extends Component
{
    public function render()
    {
        $videprecords = VideoGallery::where('status', 'Active')->get();
        return view('livewire.frontend.videogallery.view-video-gallery' ,['videprecords' =>$videprecords]);
    }
}
