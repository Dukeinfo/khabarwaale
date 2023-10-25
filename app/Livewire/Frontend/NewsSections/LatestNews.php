<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Advertisment;
use App\Models\NewsPost;
use Livewire\Component;

class LatestNews extends Component
{
    public function render()
    {

                    $latestHinNewsData = NewsPost::with('getmenu', 'newstype' )
                            ->where('status', 'Approved')
                            ->whereNull('deleted_at')
                            ->where(function ($query) {
                                $query->whereIn('breaking_side', ['Show']);
                            })
                            ->take(6) // Limit the number of results to 6
                            ->orderBy('created_at', 'desc')
                            ->where('news_type' ,1)
                            ->get();

                    $latestEngNewsData = NewsPost::with('getmenu', 'newstype' )
                            ->where('status', 'Approved')
                            ->whereNull('deleted_at')
                            ->where(function ($query) {
                                $query->whereIn('breaking_side', ['Show']);
                            })
                            ->take(6) // Limit the number of results to 6
                            ->orderBy('created_at', 'desc')
                            ->where('news_type' ,2)
                            ->get();
                    $latestPbiNewsData = NewsPost::with('getmenu', 'newstype' )
                            ->where('status', 'Approved')
                            ->whereNull('deleted_at')
                            ->where(function ($query) {
                                $query->whereIn('breaking_side', ['Show']);
                            })
                            ->take(6) // Limit the number of results to 6
                            ->orderBy('created_at', 'desc')
                            ->where('news_type' ,3)
                            ->get();
                    $latestUrduNewsData = NewsPost::with('getmenu', 'newstype' )
                            ->where('status', 'Approved')
                            ->whereNull('deleted_at')
                            ->where(function ($query) {
                                $query->whereIn('breaking_side', ['Show']);
                            })
                            ->take(6) // Limit the number of results to 6
                            ->orderBy('created_at', 'desc')
                            ->where('news_type' ,4)
                            ->get();
                  $latestAllNewsData = NewsPost::with('getmenu', 'newstype' )
                            ->where('status', 'Approved')
                            ->whereNull('deleted_at')
                            ->where(function ($query) {
                                $query->whereIn('breaking_side', ['Show']);
                            })
                            ->orderBy('created_at', 'desc')
                            ->get();

                            $today = now()->toDateString();
                            $latestRightAds = Advertisment::where('from_date', '<=', $today)
                                               ->where('to_date', '>=', $today)
                                               ->where('location','Left Add')
                                               ->where('page_name' ,'Homepage')
                                               ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                                               ->orderBy('created_at', 'desc')
                                               ->first();
                                          
        return view('livewire.frontend.news-sections.latest-news' ,[
                'latestHinNewsData' =>$latestHinNewsData,
                'latestEngNewsData'  => $latestEngNewsData,
                'latestPbiNewsData' => $latestPbiNewsData,
                'latestUrduNewsData' => $latestUrduNewsData,
                'latestAllNewsData' => $latestAllNewsData,
                'latestRightAds' =>$latestRightAds,
    ]);
    }
}
