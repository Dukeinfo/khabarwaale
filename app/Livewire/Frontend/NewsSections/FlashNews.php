<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\NewsPost;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
class FlashNews extends Component
{

    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }

    public function render()
    {
    
    $newsPosts = Cache::remember('flash_news_posts', now()->addMinutes(1), function () {
        $today = Carbon::now()->toDateString();

        $newsPosts = NewsPost::select('id', 'slug', 'news_type', 'category_id', 'user_id', 'title', 'slug', 'heading', 
                'status',    'deleted_at',    'post_date',    'breaking_side',    'breaking_top',    'slider',    
                 'image', 'thumbnail','created_at','updated_at')
                ->with('getmenu', 'newstype', 'user')
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
            ->where('news_type', $this->getNewsType())
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return $newsPosts;
    });
                                
        return view('livewire.frontend.news-sections.flash-news' ,['newsPosts' => $newsPosts]);
    }


    private function getNewsType()
    {
        switch ($this->languageVal) {
            case 'hindi':
                return 1;
                break;
            case 'english':
                return 2;
                break;
            case 'punjabi':
                return 3;
                break;
            case 'urdu':
                return 4;
                break;
            default:
                return 1;
                // Handle the default case if needed
        }
    }
}
