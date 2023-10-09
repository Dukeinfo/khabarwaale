<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\NewsPost;
use Livewire\Component;
use Livewire\Attributes\Computed;
class FlashNews extends Component
{

    #[Computed]
    public function flashNewsData()
    {
        return NewsPost::with('getmenu', 'newstype', 'user') 
        ->where('status', 'Approved') ->whereNull('deleted_at')
        ->where(function ($query) { $query->whereIn('breaking_side', ['Show'])
                 ->orWhereIn('breaking_top', ['Show'])
                 ->orWhereIn('slider', ['Show']);
        })
        ->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {

        // $flashNewsData = NewsPost::with('getmenu', 'newstype', 'user') 
        // ->where('status', 'Approved') ->whereNull('deleted_at')
        // ->where(function ($query) { $query->whereIn('breaking_side', ['Show'])
        //          ->orWhereIn('breaking_top', ['Show'])
        //          ->orWhereIn('slider', ['Show']);
        // })
        // ->orderBy('created_at', 'desc')->get(); 

        return view('livewire.frontend.news-sections.flash-news' );
    }
}
