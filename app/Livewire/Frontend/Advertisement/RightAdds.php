<?php

namespace App\Livewire\Frontend\Advertisement;

use App\Models\Advertisment;
use Livewire\Component;

class RightAdds extends Component
{
    public function render()
    {
        $today = now()->toDateString();
        $advertisements = Advertisment::where('from_date', '<=', $today)
                           ->where('to_date', '>=', $today)
                           ->where('location','Slider Right')
                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                           ->get();
               
        return view('livewire.frontend.advertisement.right-adds' ,['advertisements' => $advertisements]);
    }
}
