<?php

namespace App\Livewire\Frontend\CategoryNews;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
class ThirdCategoryNews extends Component
{

    
    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }

    public function render()
    {

        $getMenus = Cache::remember('third_category_news_menus', now()->addMinutes(1), function () {
            return Category::orderBy('sort_id', 'ASC')
                            ->where('status', 'Active')
                            ->where('sort_id', 4)
                            ->whereNull('deleted_at')
                            ->first();
        });

        // Explode the comma-separated string of category IDs
        $categoryIds = explode(',', $getMenus->id);

        // Use caching to store the result of the query for $third_Cat_Wise_News
        $third_Cat_Wise_News = Cache::remember('third_category_news_posts_' . $this->languageVal, now()->addMinutes(1), function () use ($categoryIds) {
            return NewsPost::select('id', 'slug', 'news_type', 'category_id', 'user_id', 'title', 'slug', 'heading',  'image', 'thumbnail'
            ,'status' ,'deleted_at'   ,'breaking_side' ,  'created_at','updated_at')
            ->with(['newstype', 'user', 'getmenu'])
                            ->where(function ($query) use ($categoryIds) {
                                // Check if category_id contains any of the provided IDs
                                $query->where(function ($subquery) use ($categoryIds) {
                                    foreach ($categoryIds as $categoryId) {
                                        $subquery->orWhere('category_id', 'like', "%$categoryId%");
                                    }
                                });
                            })
                            ->orderBy('created_at', 'desc')
                            ->orderBy('updated_at', 'desc')
                            ->where('news_type', $this->getNewsType())
                            ->limit(4)
                            ->get();
        });
                            
        return view('livewire.frontend.category-news.third-category-news' ,[
                    'third_Cat_Wise_News' => $third_Cat_Wise_News,
                    'getMenus'=> $getMenus]);
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
