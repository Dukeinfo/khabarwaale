<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\NewsPost;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Carbon;

class FlashNews extends Component
{

    #[Computed]
    public function flashNewsData()
    {


        // return  $newsPosts ;
                        
    }

    public function render()
    {
        $today = Carbon::now()->toDateString();

        $newsPosts = NewsPost::with('getmenu', 'newstype', 'user')
            ->where('status', 'Approved')
            ->whereNull('deleted_at')
            ->where(function ($query) use ($today) {
                $query->where('post_date', $today) // Match the current date
                    ->orWhere(function ($query) {
                        $query->whereIn('breaking_side', ['Show'])
                            ->orWhereIn('breaking_top', ['Show'])
                            ->orWhereIn('slider', ['Show']);
                    });
            })
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('livewire.frontend.news-sections.flash-news' ,['newsPosts' => $newsPosts]);
    }
}
