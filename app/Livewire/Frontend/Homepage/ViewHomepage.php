<?php

namespace App\Livewire\Frontend\Homepage;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Lazy;
class ViewHomepage extends Component
{


    public function render()
    {

        $getMenus  =  Category::orderby('sort_id','ASC')->where('status' ,'Active')->where('deleted_at',Null)->get();
      
        $flashNewsData = NewsPost::with('getmenu', 'newstype', 'user') 
                                        ->where('status', 'Approved') ->whereNull('deleted_at')
                                        ->where(function ($query) { $query->whereIn('breaking_side', ['Show'])
                                                 ->orWhereIn('breaking_top', ['Show'])
                                                 ->orWhereIn('slider', ['Show']);
                                        })
                                        ->orderBy('created_at', 'desc')->get(); 
        
         
                               
        // ->orWhereIn('other_column_name', ['value1', 'value2']); // Add more columns as needed
        $centerNewsCat = NewsPost::with('getmenu', 'newstype', 'user') 
                                         ->where('status', 'Approved')->whereNull('deleted_at')
                                         ->orderBy('created_at', 'desc')
                                         ->limit(10)
                                         ->get();   
        return view('livewire.frontend.homepage.view-homepage' ,['getMenus' => $getMenus , 
        'flashNewsData' => $flashNewsData  ,'centerNewsCat' =>$centerNewsCat] )->layout('layouts.app'); ;
    }
}
