<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\NewsPost;
use Livewire\Component;

class LatestNews extends Component
{
    public function render()
    {

        $latestNewsData = NewsPost::with('getmenu', 'newstype', 'user') 
        ->where('status', 'Approved') ->whereNull('deleted_at')
        ->where(function ($query) { $query->whereIn('breaking_side', ['Show']);})
        ->orderBy('created_at', 'desc')
        ->limit(6)
        ->get(); 
        return view('livewire.frontend.news-sections.latest-news' ,['latestNewsData' =>$latestNewsData]);
    }
}
