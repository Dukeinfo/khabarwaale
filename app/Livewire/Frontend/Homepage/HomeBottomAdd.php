<?php

namespace App\Livewire\Frontend\Homepage;

use App\Models\Advertisment;
use Livewire\Component;

class HomeBottomAdd extends Component
{
    public function render()
    {
        $today = now()->toDateString();
        $homeBottomAdd  = Advertisment::where('from_date', '<=', $today)
                           ->where('to_date', '>=', $today)
                           ->where('location','Under More News')
                           ->where('page_name' ,'Home')
                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                           ->first();
        return view('livewire.frontend.homepage.home-bottom-add' ,['homeBottomAdd' => $homeBottomAdd]);
    }
}
