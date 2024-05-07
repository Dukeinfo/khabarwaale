<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
class BottomNews extends Component
{ 
    

    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }


    public function render(){
        // Retrieve the category with specific conditions
 
                $get_bottom1_Menus = Cache::remember('bottom1_category',now()->addMinutes(1), function () {
                    return Category::orderBy('sort_id', 'ASC')
                        ->where('status', 'Active')
                        ->where('sort_id', 6)
                        ->whereNull('deleted_at')
                        ->first();
                });
        
                // If category data is not available, return an empty view
                if (!$get_bottom1_Menus) {
                    return view('livewire.frontend.news-sections.bottom-news');
                }

        
        // Explode the comma-separated string of category IDs
        $categoryIds = explode(',', $get_bottom1_Menus->id);
        
     // Use caching for the category data with a cache duration of 10 minutes (600 seconds)
        $five_CatWise_News = Cache::remember('bottom1_news_' . $this->languageVal, now()->addMinutes(1), function () use ($categoryIds) {
            return NewsPost::select('id', 'slug', 'news_type', 'category_id', 'user_id', 'title', 'slug', 'heading', 
            'image', 'thumbnail', 'status','created_at','updated_at')
                ->with(['newstype', 'user', 'getmenu'])
                ->where(function ($query) use ($categoryIds) {
                    // Check if category_id contains any of the provided IDs
                    $query->where(function ($subquery) use ($categoryIds) {
                        foreach ($categoryIds as $categoryId) {
                            $subquery->orWhere('category_id', 'like', "%$categoryId%");
                        }
                    });
                })
                ->when($this->languageVal !== 'all', function ($query) {
                    // Filter news posts based on language type
                    $query->where('news_type', $this->getNewsType());
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('updated_at', 'desc')
                ->limit(4)
                ->get();
        });
        // Return the view along with retrieved data
           return view('livewire.frontend.news-sections.bottom-news' ,[
                    'get_bottom1_Menus' =>$get_bottom1_Menus ,
                    'five_CatWise_News' => $five_CatWise_News,


        ]);
    }

    private function getNewsType()
    {
        switch ($this->languageVal) {
            case 'hindi':
                return 1;
            case 'english':
                return 2;
            case 'punjabi':
                return 3;
            case 'urdu':
                return 4;
            default:
                return 1;
                // Handle the default case if needed
        }
    }
}
