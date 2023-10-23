<?php

namespace App\Livewire\Frontend\Advertisement;

use App\Models\Advertisment;
use App\Models\VideoGallery;
use Livewire\Component;

class RightAdds extends Component
{
    public function render()
    {
        $today = now()->toDateString();
        $rightAdvertisements = Advertisment::where('from_date', '<=', $today)
                           ->where('to_date', '>=', $today)
                           ->where('location','Slider Right')
                           ->where('page_name' ,'Homepage')

                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                           ->get();
               
                           
        $homelivetvnews = VideoGallery::orderBy('created_at', 'desc') 
                        ->where('status', 'Active')
                        ->whereNull('deleted_at')
                        ->first();
        return view('livewire.frontend.advertisement.right-adds' ,[
            'rightAdvertisements' => $rightAdvertisements,
            'homelivetvnews' =>$homelivetvnews,
        ]);
    }
}
