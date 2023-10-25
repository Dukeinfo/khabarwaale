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
                        ->where('location', 'Right Add')
                        ->where('page_name', 'inner')
                        ->where('status', 'Yes')
                        ->orderBy('created_at', 'desc') // Order by 'created_at' in descending order
                        ->limit(3)
                        ->get();
    
        return view('livewire.frontend.innerpage.inner-page-right-add' ,['innerrightAdd' =>$innerrightAdd]);
    }
}
