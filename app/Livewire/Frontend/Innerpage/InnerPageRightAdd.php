<?php

namespace App\Livewire\Frontend\Innerpage;

use App\Models\Advertisment;
use Livewire\Component;

class InnerPageRightAdd extends Component
{
    public function render()
    {
        $today = now()->toDateString();
        $innerrightAdd = Advertisment::where('from_date', '<=', $today)
                           ->where('to_date', '>=', $today)
                           ->where('location','Slider Right')
                           ->where('page_name' ,'inner')
                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                           ->get();
        return view('livewire.frontend.innerpage.inner-page-right-add' ,['innerrightAdd' =>$innerrightAdd]);
    }
}
