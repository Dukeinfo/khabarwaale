<?php

namespace App\Livewire\Frontend\Category;

use App\Models\Advertisment;
use App\Models\NewsPost;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
class CategoryLatestnews extends Component
{
 public $category;
public $languageVal;

    public function mount($categoryId){
      $this->category =  $categoryId;
      $this->languageVal = session()->get('language');

  
    }
    public function render()
    {
    //     $categoryIds = explode(',', $this->category);

    //     $catWiselatest_eng_News = NewsPost::with(['newstype', 'user', 'getmenu'])
    //     ->where(function ($query) use ($categoryIds) {
    //         // Check if category_id contains any of the provided IDs
    //         $query->where(function ($subquery) use ($categoryIds) {
    //             foreach ($categoryIds as $categoryId) {
    //                 $subquery->orWhere('category_id', 'like', "%$categoryId%");
    //             }
    //         });
    //     })
    //     ->orderBy('created_at', 'desc')
    //     ->orderBy('updated_at', 'desc')
    //     ->orderByRaw('RAND()');
    
    // switch ($this->languageVal) {
    //     case 'hindi':
    //         $catWiselatest_eng_News->where('news_type', 1);
    //         break;
    
    //     case 'english':
    //         $catWiselatest_eng_News->where('news_type', 2);
    //         break;
    
    //     case 'punjabi':
    //         $catWiselatest_eng_News->where('news_type', 3);
    //         break;
    
    //     case 'urdu':
    //         $catWiselatest_eng_News->where('news_type', 4);
    //         break;
    
    //     default:
    //       $catWiselatest_eng_News->where('news_type', 1);
    //         // Handle the default case if needed
    // }
    
    //         $catWiselatest_eng_News = $catWiselatest_eng_News->limit(6)->get();
                $cacheKey = 'category_latest_news_' . $this->category . '_' . $this->languageVal;

                $catWiselatest_eng_News = Cache::remember($cacheKey, now()->addMinutes(1), function () {
                    $categoryIds = explode(',', $this->category);

                    return NewsPost::select('id', 'slug', 'news_type', 'category_id', 'user_id', 'title', 'slug', 'heading', 
                    'image', 'thumbnail', "status" ,"created_at" )
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
                        ->when($this->languageVal, function ($query, $language) {
                            switch ($language) {
                                case 'hindi':
                                    return $query->where('news_type', 1);
                                case 'english':
                                    return $query->where('news_type', 2);
                                case 'punjabi':
                                    return $query->where('news_type', 3);
                                case 'urdu':
                                    return $query->where('news_type', 4);
                                default:
                                    return $query->where('news_type', 1);
                            }
                        })
                        ->limit(6)
                        ->get();
                });

            $today = now()->toDateString();
            $categorylatestleftAds = Advertisment::where('from_date', '<=', $today)
                            ->where('to_date', '>=', $today)
                            ->where('location','Left Add')
                            ->where('page_name' ,'category')
                            ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                            ->orderBy('created_at', 'desc')
                            ->first();
                return view('livewire.frontend.category.category-latestnews' , [
                'categorylatestleftAds' => $categorylatestleftAds,
                'catWiselatest_eng_News' =>$catWiselatest_eng_News]);
    }
}
