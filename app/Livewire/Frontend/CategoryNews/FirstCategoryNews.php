<?php

namespace App\Livewire\Frontend\CategoryNews;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
class FirstCategoryNews extends Component
{
    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    }
    #[Url(history: true)]
    public function render(){
            // Retrieve the category with specific conditions 
            $getMenus = Cache::remember('first_category_news_menus', now()->addMinutes(5), function () {
                return Category::orderBy('sort_id', 'ASC')
                                ->where('status', 'Active')
                                ->where('sort_id', 2)
                                ->whereNull('deleted_at')
                                ->first();
            });
            // Explode the comma-separated string of category IDs
  
            $ca1t_Wise_News = Cache::remember('first_category_news_posts_' . $this->languageVal, now()->addMinutes(5), function () use ($getMenus) {
                if ($getMenus) {    
                    $categoryIds = explode(',', $getMenus->id);
                    return NewsPost::select('id', 'slug', 'news_type', 'category_id', 'user_id', 'title', 'slug', 'heading',  'image', 'thumbnail'
                    ,'status' ,'deleted_at'   ,'breaking_side' ,  'created_at','updated_at')
                    ->with(['newstype', 'user', 'getmenu'])
                                    ->where(function ($query) use ($categoryIds) {
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
                } else {
                    return collect();
                }
            });

            // Return the view along with retrieved data
            return view('livewire.frontend.category-news.first-category-news', [
                'getMenus' => $getMenus,
                'ca1t_Wise_News' => $ca1t_Wise_News,
            ]);
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
