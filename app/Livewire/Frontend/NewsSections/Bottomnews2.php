<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
class Bottomnews2 extends Component
{

    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }

 
    public function render(){
        // Retrieve the category with specific conditions
  
            $get_bottom2_Menus = Cache::remember('bottom2_category', now()->addMinutes(10), function () {
                return Category::orderBy('sort_id', 'ASC')
                    ->where('status', 'Active')
                    ->where('sort_id', 7)
                    ->whereNull('deleted_at')
                    ->first();
            });
        
            if (!$get_bottom2_Menus) {
                return view('livewire.frontend.news-sections.bottomnews2');
            }
    
        // Explode the comma-separated string of category IDs
        $categoryIds = explode(',', $get_bottom2_Menus->id);
        
        // Retrieve news posts with eager loaded relationships
        // Use caching for news posts data
        $six_CatWise_News = Cache::remember('bottom2_news_' . $this->languageVal,  now()->addMinutes(10), function () use ($categoryIds) {
            return NewsPost::select('id', 'news_type', 'category_id', 'user_id', 'title', 'slug', 'heading',  'image', 'thumbnail','created_at','updated_at')
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
          return view('livewire.frontend.news-sections.bottomnews2',[
                'get_bottom2_Menus' =>$get_bottom2_Menus ,
                'six_CatWise_News' => $six_CatWise_News,
    

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
