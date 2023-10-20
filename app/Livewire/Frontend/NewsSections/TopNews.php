<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Advertisment;
use App\Models\NewsPost;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class TopNews extends Component
{

  



    public function render()
    {    
                $topHinNewsData = NewsPost::with('getmenu', 'newstype') 
                        ->where('status', 'Approved') ->whereNull('deleted_at')
                        ->where(function ($query) { $query->whereIn('breaking_top', ['Show']);})
                        ->orderBy('created_at', 'desc')
                        ->where('news_type' ,1)
                        ->limit(7)

                        ->get(); 

                    $topEngNewsData = NewsPost::with('getmenu', 'newstype') 
                        ->where('status', 'Approved') ->whereNull('deleted_at')
                        ->where(function ($query) { $query->whereIn('breaking_top', ['Show']);})
                        ->orderBy('created_at', 'desc')
                        ->where('news_type' ,2)
                        ->limit(7)

                        ->get();     

                    $topPbiNewsData = NewsPost::with('getmenu', 'newstype') 
                        ->where('status', 'Approved') ->whereNull('deleted_at')
                        ->where(function ($query) { $query->whereIn('breaking_top', ['Show']);})
                        ->orderBy('created_at', 'desc')
                        ->where('news_type' ,3)
                        ->limit(7)

                        ->get();     

                    $topUrduNewsData = NewsPost::with('getmenu', 'newstype') 
                        ->where('status', 'Approved') ->whereNull('deleted_at')
                        ->where(function ($query) { $query->whereIn('breaking_top', ['Show']);})
                        ->orderBy('created_at', 'desc')
                        ->where('news_type' ,4)
                        ->limit(7)
                        ->get();      

                        $today = now()->toDateString();
                        $topNewsCentertAds = Advertisment::where('from_date', '<=', $today)
                                           ->where('to_date', '>=', $today)
                                           ->where('location','News Center')
                                           ->where('page_name' ,'Home')
                
                                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                                           ->first();
            return view('livewire.frontend.news-sections.top-news' ,[
                'topHinNewsData' => $topHinNewsData,
                'topEngNewsData' => $topEngNewsData,
                'topPbiNewsData' => $topPbiNewsData,
                'topUrduNewsData' => $topUrduNewsData,
                'topNewsCentertAds' => $topNewsCentertAds,
            ]);
    }
}
