<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Advertisment;
use App\Models\NewsPost;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
class TopNews extends Component
{
    use WithPagination;
    public $languageVal;
    public $perPage =3;
    
    public function mount(){ 

          $this->languageVal = session()->get('language');
    }

    public function render()
    {    
        $top_NewsData = Cache::remember('top_news_posts_' . $this->languageVal, now()->addMinutes(10), function () {
            return NewsPost::select('id', 'news_type', 'category_id', 'user_id', 'title', 'slug', 'heading',  'image', 'thumbnail','created_at','updated_at')
            ->with('getmenu', 'newstype')
                ->where('status', 'Approved')
                ->whereNull('deleted_at')
                ->whereIn('breaking_top', ['Show'])
                ->where('news_type', $this->getNewsType())
                ->orderBy('created_at', 'desc')
                ->limit(7)
                ->paginate($this->perPage);
        });
        $today = now()->toDateString();
        $topNewsCentertAds = Advertisment::where('from_date', '<=', $today)
            ->where('to_date', '>=', $today)
            ->where('location', 'Under Top News')
            ->where('page_name', 'Homepage')
            ->where('status', 'Yes')
            ->orderBy('created_at', 'desc')
            ->first();



            return view('livewire.frontend.news-sections.top-news' ,[
                'top_NewsData' => $top_NewsData,
                'topNewsCentertAds' => $topNewsCentertAds,
            ]);
    }

    public function loadMoretopNews()
    {
        if ($this->perPage >= 6) {
            return; // Stop loading more items
        }

        // Increment the limit for news items, but make sure it doesn't exceed 6
        $this->perPage = min($this->perPage + 1, 6);
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
