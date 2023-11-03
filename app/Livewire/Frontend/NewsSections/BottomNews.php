<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Attributes\Url;
use Livewire\Component;

class BottomNews extends Component
{ 
    

    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }

    public function render()
    {
        $get_bottom1_Menus = Category::orderBy('sort_id', 'ASC')
                ->where('status', 'Active')->where('sort_id' ,5)->whereNull('deleted_at')->first();



                $five_CatWise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
                ->where(function ($query)  {
                    $query->whereHas('getmenu', function ($subquery)  {
                        $subquery->where('sort_id', 'like', '%' . '5' . '%');

                    });
                })->orderBy('created_at', 'desc')
                    ->orderBy('updated_at', 'desc')
                    ->where('category_id' ,$get_bottom1_Menus->id);

       // Limit the number of results to 6
        
                switch ($this->languageVal) {
                    case 'hindi':
                        $five_CatWise_News->where('news_type', 1);
                        break;
                
                    case 'english':
                        $five_CatWise_News->where('news_type', 2);
                        break;
                
                    case 'punjabi':
                        $five_CatWise_News->where('news_type', 3);
                        break;
                
                    case 'urdu':
                        $five_CatWise_News->where('news_type', 4);
                        break;
                
                    default:
                        $five_CatWise_News->where('news_type', 1);
                        // Handle the default case if needed
                }
    
            $five_CatWise_News = $five_CatWise_News->limit(4)->get();



        return view('livewire.frontend.news-sections.bottom-news' ,[
                    'get_bottom1_Menus' =>$get_bottom1_Menus ,
                    'five_CatWise_News' => $five_CatWise_News,


        ]);
    }
}
