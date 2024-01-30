<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class Bottomnews3 extends Component
{


    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }


    // public function render()
    // {
        
    //     $get_bottom3_Menus = Category::orderBy('sort_id', 'ASC')
    //             ->where('status', 'Active')->where('sort_id' ,8)->whereNull('deleted_at')->first();
                

    //             $seven_CatWise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
    //             ->where(function ($query)  {
    //                 $query->whereHas('getmenu', function ($subquery)  {
    //                     $subquery->where('sort_id', 'like', '%' . '8' . '%');
    
    //                 });
    //             })->orderBy('created_at', 'desc')
    //                 ->orderBy('updated_at', 'desc')
    //                 ->where('category_id' ,$get_bottom3_Menus->id);
    //        // Limit the number of results to 6
            
    //                 switch ($this->languageVal) {
    //                     case 'hindi':
    //                         $seven_CatWise_News->where('news_type', 1);
    //                         break;
                    
    //                     case 'english':
    //                         $seven_CatWise_News->where('news_type', 2);
    //                         break;
                    
    //                     case 'punjabi':
    //                         $seven_CatWise_News->where('news_type', 3);
    //                         break;
                    
    //                     case 'urdu':
    //                         $seven_CatWise_News->where('news_type', 4);
    //                         break;
                    
    //                     default:
    //                     $seven_CatWise_News->where('news_type', 1);
    //                         // Handle the default case if needed
    //                 }
        
    //             $seven_CatWise_News = $seven_CatWise_News->limit(4)->get();  



    //     return view('livewire.frontend.news-sections.bottomnews3',[
    //                 'get_bottom3_Menus' =>$get_bottom3_Menus ,
    //                 'seven_CatWise_News' => $seven_CatWise_News,
             
    //     ]);
    // }

    public function render(){
        // Retrieve the category with specific conditions
        $get_bottom3_Menus = Category::orderBy('sort_id', 'ASC')
                            ->where('status', 'Active')
                            ->where('sort_id', 8)
                            ->whereNull('deleted_at')
                            ->first();
        
        // Explode the comma-separated string of category IDs
        $categoryIds = explode(',', $get_bottom3_Menus->id);
        
        // Retrieve news posts with eager loaded relationships
        $seven_CatWise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
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
                $seven_CatWise_News->where('news_type', 1);
                break;
            
            case 'english':
                $seven_CatWise_News->where('news_type', 2);
                break;
            
            case 'punjabi':
                $seven_CatWise_News->where('news_type', 3);
                break;
            
            case 'urdu':
                $seven_CatWise_News->where('news_type', 4);
                break;
            
            default:
                $seven_CatWise_News->where('news_type', 1);
                // Handle the default case if needed
        }

        // Limit the number of retrieved news posts
        $seven_CatWise_News = $seven_CatWise_News->limit(4)->get();
        // Return the view along with retrieved data
        return view('livewire.frontend.news-sections.bottomnews3',[
                    'get_bottom3_Menus' =>$get_bottom3_Menus ,
                    'seven_CatWise_News' => $seven_CatWise_News,
             
        ]);
    }
}
