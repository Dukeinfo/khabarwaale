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


    public function render()
    {
        
        $get_bottom3_Menus = Category::orderBy('sort_id', 'ASC')
                ->where('status', 'Active')->where('sort_id' ,8)->whereNull('deleted_at')->first();
                

                $seven_CatWise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
                ->where(function ($query)  {
                    $query->whereHas('getmenu', function ($subquery)  {
                        $subquery->where('sort_id', 'like', '%' . '7' . '%');
    
                    });
                })->orderBy('created_at', 'desc')
                    ->orderBy('updated_at', 'desc')
                    ->where('category_id' ,$get_bottom3_Menus->id);
           // Limit the number of results to 6
            
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
        
                $seven_CatWise_News = $seven_CatWise_News->limit(4)->get();  



        return view('livewire.frontend.news-sections.bottomnews3',[
                    'get_bottom3_Menus' =>$get_bottom3_Menus ,
                    'seven_CatWise_News' => $seven_CatWise_News,
             
        ]);
    }
}
