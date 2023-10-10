<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\NewsPost;
use Livewire\Component;

class TopNews extends Component
{


public function placeholder(){
    return view('placeholder');
}


    public function render()
    {
        $topNewsData = NewsPost::with('getmenu', 'newstype') 
        ->where('status', 'Approved') ->whereNull('deleted_at')
        ->where(function ($query) { $query->whereIn('breaking_top', ['Show']);})
        ->orderBy('created_at', 'desc')
        ->limit(6)
        ->get();     
        return view('livewire.frontend.news-sections.top-news' ,['topNewsData' =>$topNewsData]);
    }
}
