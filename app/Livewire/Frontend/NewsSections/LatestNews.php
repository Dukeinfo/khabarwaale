<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Advertisment;
use App\Models\NewsPost;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
class LatestNews extends Component
{
    use WithPagination;

    public $languageVal;

    public $posts;
    public $perPage = 5;
    public $currentPage = 1;

     public function mount()
    {
        $this->languageVal = session()->get('language');
    }


    public function render()
    {
        $latestHinNewsData = Cache::remember('latest_news_posts_' . $this->languageVal, now()->addMinutes(1), function () {
            return NewsPost::select('id', 'slug', 'news_type', 'category_id', 'user_id', 'title', 'slug', 'heading',  'image', 'thumbnail'
                ,'status' ,'deleted_at'   ,'breaking_side' ,  'created_at','updated_at')
                ->with('getmenu', 'newstype')
                ->where('status', 'Approved')
                ->whereNull('deleted_at')
                ->where(function ($query) {
                    $query->whereIn('breaking_side', ['Show']);
                })
                ->where('news_type', $this->getNewsType())
                ->take(6)
                ->orderBy('created_at', 'desc')
                ->paginate(7);
        });

        $today = now()->toDateString();
        $latestRightAds = Advertisment::where('from_date', '<=', $today)
            ->where('to_date', '>=', $today)
            ->where('location', 'Left Add')
            ->where('page_name', 'Homepage')
            ->where('status', 'Yes')
            ->orderBy('created_at', 'desc')
            ->first();
                                          
        return view('livewire.frontend.news-sections.latest-news' ,[
                'latestHinNewsData' =>$latestHinNewsData,
                'latestRightAds' =>$latestRightAds,
    ]);
    }

    public function loadMorelatest()
    {
        if ($this->perPage >= 8) {
            return; // Stop loading more items
        }
        $this->perPage = min($this->perPage + 1, 8);
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
