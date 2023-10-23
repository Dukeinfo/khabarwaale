<?php

namespace App\Livewire\Frontend\Homepage;

use App\Models\Advertisment;
use Livewire\Component;

class HomeTopAdd extends Component
{
    public function render()
    {

        $today = now()->toDateString();
        $homeTopAdd = Advertisment::where('from_date', '<=', $today)
                           ->where('to_date', '>=', $today)
                           ->where('location','Top Header')
                           ->where('page_name' ,'Homepage')
                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                           ->first();
                       
        return view('livewire.frontend.homepage.home-top-add' ,['homeTopAdd' =>$homeTopAdd]);
    }
}
