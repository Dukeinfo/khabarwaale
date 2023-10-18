<?php

namespace App\Livewire\Frontend\Homepage;

use App\Models\Advertisment;
use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Lazy;
class ViewHomepage extends Component
{


    public function render()
    {

                // $getMenus = Category::orderBy('sort_id', 'ASC')
                // ->where('status', 'Active')
                // ->whereNull('deleted_at')
                // ->get();


                                
                $centerNewsCat = NewsPost::with('getmenu', 'newstype', 'user')
                ->where('status', 'Approved')
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();
        // ->orWhereIn('other_column_name', ['value1', 'value2']); // Add more columns as needed
                $today = now()->toDateString();
                $sliderTops = Advertisment::where('from_date', '<=', $today)
                ->where('to_date', '>=', $today)
                ->where('location','Slider Top')
                ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                ->first();
        return view('livewire.frontend.homepage.view-homepage' ,['centerNewsCat' =>$centerNewsCat ,'sliderTops' =>  $sliderTops] )->layout('layouts.app'); 
    }
}
