<?php

namespace App\Livewire\Frontend\Category;

use App\Models\Advertisment;
use Livewire\Component;

class CategoryTopAdd extends Component
{
    public function render()
    {

        $today = now()->toDateString();
        $categoryTopAdd = Advertisment::where('from_date', '<=', $today)
                           ->where('to_date', '>=', $today)
                           ->where('location','Top Header')
                           ->where('page_name' ,'category')
                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                           ->first();
        return view('livewire.frontend.category.category-top-add',['categoryTopAdd' => $categoryTopAdd]);
    }
}
