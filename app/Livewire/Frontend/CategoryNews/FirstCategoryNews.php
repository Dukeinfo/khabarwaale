<?php

namespace App\Livewire\Frontend\CategoryNews;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Attributes\Url;
use Livewire\Component;

class FirstCategoryNews extends Component
{

    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }

    #[Url(history: true)]
    public function render()
    {
                $getMenus = Category::orderBy('sort_id', 'ASC')
                            ->where('status', 'Active')->where('sort_id' ,1)->whereNull('deleted_at')->first();
                $ca1t_Wise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
                        ->where(function ($query)  {
                            $query->whereHas('getmenu', function ($subquery)  {
                                $subquery->where('sort_id', 'like', '%' . '1' . '%');

                            });
                        })->orderBy('created_at', 'desc')
                        ->orderBy('updated_at', 'desc')
                        ->where('category_id' ,$getMenus->id);


                        switch ($this->languageVal) {
                            case 'hindi':
                                $ca1t_Wise_News->where('news_type', 1);
                                break;
                        
                            case 'english':
                                $ca1t_Wise_News->where('news_type', 2);
                                break;
                        
                            case 'punjabi':
                                $ca1t_Wise_News->where('news_type', 3);
                                break;
                        
                            case 'urdu':
                                $ca1t_Wise_News->where('news_type', 4);
                                break;
                        
                            default:
                                $ca1t_Wise_News->where('news_type', 1);
                                // Handle the default case if needed
                        }
            
                    $ca1t_Wise_News = $ca1t_Wise_News->limit(4)->get();


                 return view('livewire.frontend.category-news.first-category-news',[
                        'getMenus' =>$getMenus,
                        'ca1t_Wise_News' => $ca1t_Wise_News ,
               

        
        ]);
    }
}
