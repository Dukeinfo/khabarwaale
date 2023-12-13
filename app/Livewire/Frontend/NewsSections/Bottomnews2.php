<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class Bottomnews2 extends Component
{

    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }

    public function render()
    {
        $get_bottom2_Menus = Category::orderBy('sort_id', 'ASC')
                            ->where('status', 'Active')->where('sort_id' ,7)->whereNull('deleted_at')->first();

        $six_CatWise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
                                ->where(function ($query)  {
                                    $query->whereHas('getmenu', function ($subquery)  {
                                    $subquery->where('sort_id', 'like', '%' . '7' . '%');

                                });
                                })->orderBy('created_at', 'desc')
                                    ->orderBy('updated_at', 'desc')
                                    ->where('category_id' ,$get_bottom2_Menus->id);
            
                       // Limit the number of results to 6
                        
                                switch ($this->languageVal) {
                                    case 'hindi':
                                        $six_CatWise_News->where('news_type', 1);
                                        break;
                                
                                    case 'english':
                                        $six_CatWise_News->where('news_type', 2);
                                        break;
                                
                                    case 'punjabi':
                                        $six_CatWise_News->where('news_type', 3);
                                        break;
                                
                                    case 'urdu':
                                        $six_CatWise_News->where('news_type', 4);
                                        break;
                                
                                    default:
                                    $six_CatWise_News->where('news_type', 1);
                                        // Handle the default case if needed
                                }
                    
                            $six_CatWise_News = $six_CatWise_News->limit(4)->get();




        return view('livewire.frontend.news-sections.bottomnews2',[
                'get_bottom2_Menus' =>$get_bottom2_Menus ,
                'six_CatWise_News' => $six_CatWise_News,
    

        ]);
    }
}
