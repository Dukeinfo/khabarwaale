<?php

namespace App\Livewire\Frontend\Innerpage;

use App\Models\Advertisment;
use Livewire\Component;

class InnerPageTopAdd extends Component
{
    public function render()
    {
        $today = now()->toDateString();
        $innerTopAdd = Advertisment::where('from_date', '<=', $today)
                           ->where('to_date', '>=', $today)
                           ->where('location','Top Banner')
                           ->where('page_name' ,'inner')
                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                           ->orderBy('created_at', 'desc')
                           ->limit(3)
                           ->get();
         
        return view('livewire.frontend.innerpage.inner-page-top-add' ,['innerTopAdd' => $innerTopAdd]);
    }
}
