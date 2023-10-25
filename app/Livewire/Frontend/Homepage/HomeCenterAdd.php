<?php

namespace App\Livewire\Frontend\Homepage;

use App\Models\Advertisment;
use Livewire\Component;

class HomeCenterAdd extends Component
{
    public function render()
    {

        $today = now()->toDateString();
        $homeCenterLongAdd  = Advertisment::where('from_date', '<=', $today)
                           ->where('to_date', '>=', $today)
                           ->where('location','Center Banner')
                           ->where('page_name' ,'Homepage')
                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                           ->orderBy('created_at', 'desc')
                           ->first();
        return view('livewire.frontend.homepage.home-center-add' , ['homeCenterLongAdd' =>$homeCenterLongAdd]);
    }
}
