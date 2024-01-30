<?php

namespace App\Livewire\Frontend\CategoryNews;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class ThirdCategoryNews extends Component
{

    
    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }


    // public function render()
    // {
    //     $getMenus = Category::orderBy('sort_id', 'ASC')
    //                 ->where('status', 'Active')->where('sort_id' ,4)->whereNull('deleted_at')->first();
                    
    //     $third_Cat_Wise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
    //                     ->where(function ($query)  {
    //                         $query->whereHas('getmenu', function ($subquery)  {
    //                             $subquery->where('sort_id', 'like', '%' . '4' . '%');

    //                         });
    //                         })->orderBy('created_at', 'desc')
    //                             ->orderBy('updated_at', 'desc')
    //                             ->where('category_id' ,$getMenus->id);

    //                             switch ($this->languageVal) {
    //                                 case 'hindi':
    //                                     $third_Cat_Wise_News->where('news_type', 1);
    //                                     break;
                                
    //                                 case 'english':
    //                                     $third_Cat_Wise_News->where('news_type', 2);
    //                                     break;
                                
    //                                 case 'punjabi':
    //                                     $third_Cat_Wise_News->where('news_type', 3);
    //                                     break;
                                
    //                                 case 'urdu':
    //                                     $third_Cat_Wise_News->where('news_type', 4);
    //                                     break;
                                
    //                                 default:
    //                                     $third_Cat_Wise_News->where('news_type', 1);
    //                                     // Handle the default case if needed
    //                             }
                    
    //                         $third_Cat_Wise_News = $third_Cat_Wise_News->limit(4)->get();
                     

                            
    //     return view('livewire.frontend.category-news.third-category-news' ,[
    //                 'third_Cat_Wise_News' => $third_Cat_Wise_News,
    //                 'getMenus'=> $getMenus]);
    // }

    public function render()
    {

        $getMenus = Category::orderBy('sort_id', 'ASC')
        ->where('status', 'Active')
        ->where('sort_id', 4)
        ->whereNull('deleted_at')
        ->first();

        // Explode the comma-separated string of category IDs
        $categoryIds = explode(',', $getMenus->id);

        // Retrieve news posts with eager loaded relationships
        $third_Cat_Wise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
            ->where(function ($query) use ($categoryIds) {
                // Check if category_id contains any of the provided IDs
                $query->where(function ($subquery) use ($categoryIds) {
                    foreach ($categoryIds as $categoryId) {
                        $subquery->orWhere('category_id', 'like', "%$categoryId%");
                    }
                });
            })
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc');

        // Filter news posts based on language type
        switch ($this->languageVal) {
        case 'hindi':
        $third_Cat_Wise_News->where('news_type', 1);
        break;

        case 'english':
        $third_Cat_Wise_News->where('news_type', 2);
        break;

        case 'punjabi':
        $third_Cat_Wise_News->where('news_type', 3);
        break;

        case 'urdu':
        $third_Cat_Wise_News->where('news_type', 4);
        break;

        default:
        $third_Cat_Wise_News->where('news_type', 1);
        // Handle the default case if needed
        }

        // Limit the number of retrieved news posts
        $third_Cat_Wise_News = $third_Cat_Wise_News->limit(4)->get();


                            
        return view('livewire.frontend.category-news.third-category-news' ,[
                    'third_Cat_Wise_News' => $third_Cat_Wise_News,
                    'getMenus'=> $getMenus]);
    }
}
