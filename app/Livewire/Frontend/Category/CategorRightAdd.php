<?php

namespace App\Livewire\Frontend\Category;

use App\Models\Advertisment;
use App\Models\VideoGallery;
use Livewire\Component;

class CategorRightAdd extends Component
{
    public function render()
    {
        $today = now()->toDateString();
        $categoryRightAdd = Advertisment::where('from_date', '<=', $today)
                           ->where('to_date', '>=', $today)
                           ->where('location','Right Add')
                           ->where('page_name' ,'category')
                           ->where('status', 'Yes') // Assuming  'status' is used to enable/disable ads
                           ->orderBy('created_at', 'desc')
                           ->get();
        $categorylivetvnews = VideoGallery::orderBy('created_at', 'desc') 
        ->where('status', 'Active')
        ->whereNull('deleted_at')
        ->first();
        return view('livewire.frontend.category.categor-right-add' ,[
                'categoryRightAdd' =>$categoryRightAdd ,
                'categorylivetvnews' =>$categorylivetvnews
            ]);
    }
}
