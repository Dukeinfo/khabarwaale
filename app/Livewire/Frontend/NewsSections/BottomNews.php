<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Attributes\Url;
use Livewire\Component;

class BottomNews extends Component
{ 
    

    public function render()
    {
        $getBottomMenus  =  Category::orderby('sort_id','ASC')->where('status' ,'Active')->where('deleted_at',Null)->get();
          
        $fivthatWiseNews = NewsPost::with(['newstype', 'user', 'getmenu'])
        ->where(function ($query)  {
            $query->whereHas('getmenu', function ($subquery)  {
                $subquery->where('sort_id', 'like', '%' . '5' . '%');
            });
        })->orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc')
        ->orderByRaw('RAND()')
        ->limit(4)
        ->get();


        $sixCatWiseNews = NewsPost::with(['newstype', 'user', 'getmenu'])
        ->where(function ($query)  {
            $query->whereHas('getmenu', function ($subquery)  {
                $subquery->where('sort_id', 'like', '%' . '6' . '%');
            });
        })->orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc')
        ->orderByRaw('RAND()')
        ->limit(4)
        ->get();

        $SevenCatWiseNews = NewsPost::with(['newstype', 'user', 'getmenu'])
        ->where(function ($query)  {
            $query->whereHas('getmenu', function ($subquery)  {
                $subquery->where('sort_id', 'like', '%' . '7' . '%');
            });
        })->orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc')
        ->orderByRaw('RAND()')
        ->limit(4)
        ->get();
        
        return view('livewire.frontend.news-sections.bottom-news' ,[
        'getBottomMenus' =>$getBottomMenus ,
        'fivthatWiseNews' =>$fivthatWiseNews ,
         'sixCatWiseNews' =>$sixCatWiseNews,
         'SevenCatWiseNews' =>$SevenCatWiseNews

        ]);
    }
}
