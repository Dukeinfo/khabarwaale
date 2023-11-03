<?php

namespace App\Livewire\Frontend\CategoryNews;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class SecondCategoryNews extends Component
{
    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }
    public function render()
    {

        $getMenus = Category::orderBy('sort_id', 'ASC')
                    ->where('status', 'Active')->where('sort_id' ,2)->whereNull('deleted_at')->first();
         $second_Ca_tWise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
                    ->where(function ($query)  {
                        $query->whereHas('getmenu', function ($subquery)  {
                            $subquery->where('sort_id', 'like', '%' . '2' . '%');

                        });
                    })->orderBy('created_at', 'desc')
                        ->orderBy('updated_at', 'desc')
                        ->where('category_id' ,$getMenus->id);
                        
                        switch ($this->languageVal) {
                            case 'hindi':
                                $second_Ca_tWise_News->where('news_type', 1);
                                break;
                        
                            case 'english':
                                $second_Ca_tWise_News->where('news_type', 2);
                                break;
                        
                            case 'punjabi':
                                $second_Ca_tWise_News->where('news_type', 3);
                                break;
                        
                            case 'urdu':
                                $second_Ca_tWise_News->where('news_type', 4);
                                break;
                        
                            default:
                                $second_Ca_tWise_News->where('news_type', 1);
                                // Handle the default case if needed
                        }
            
                    $second_Ca_tWise_News = $second_Ca_tWise_News->limit(4)->get();
               



        return view('livewire.frontend.category-news.second-category-news' ,[
            'second_Ca_tWise_News' => $second_Ca_tWise_News,
              'getMenus'=> $getMenus]);
    }
}
