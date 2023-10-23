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
                           ->where('location','Top Header')
                           ->where('page_name' ,'inner')
                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                           ->first();
        return view('livewire.frontend.innerpage.inner-page-top-add' ,['innerTopAdd' => $innerTopAdd]);
    }
}
