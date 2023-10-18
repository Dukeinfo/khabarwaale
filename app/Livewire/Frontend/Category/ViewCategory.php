<?php

namespace App\Livewire\Frontend\Category;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;
use Livewire\WithPagination;

class ViewCategory extends Component
{

    use WithPagination;
public $categoryId ,$category_en, $category_hin ,$category_pbi  ,$category_urdu;
public $language_Val;

public function mount( $id){
  
    $this->language_Val = session()->get('language');
    $getCategory  =  Category::where('id' ,$id)->orderby('sort_id','ASC')->where('status' ,'Active')->where('deleted_at',Null)->first();
    $this->categoryId = $getCategory->id;
    $this->category_en =  $getCategory->category_en;
    $this->category_hin =  $getCategory->category_hin;
    $this->category_pbi =  $getCategory->category_pbi;
    $this->category_urdu =  $getCategory->category_urdu;
  
}

    public function render()
    {
                    $catWiseNewsData  = NewsPost::with(['newstype', 'user', 'getmenu'])
                            ->where(function ($query)  {
                                $query->whereHas('getmenu', function ($subquery)  {
                                    $subquery->where('id', 'like', '%' . $this->categoryId . '%')
                                    ;
                                });
                            })   
                            ->orderBy('created_at', 'desc')
                            ->orderBy('updated_at', 'desc')
                            ->orderByRaw('RAND()');
                            switch ($this->language_Val) {
                                case 'hindi':
                                    $catWiseNewsData->where('news_type', 1);
                                    break;
                            
                                case 'english':
                                    $catWiseNewsData->where('news_type', 2);
                                    break;
                            
                                case 'punjabi':
                                    $catWiseNewsData->where('news_type', 3);
                                    break;
                            
                                case 'urdu':
                                    $catWiseNewsData->where('news_type', 4);
                                    break;
                            
                                default:
                                  $catWiseNewsData->where('news_type', 1);
                                    // Handle the default case if needed
                            }
                            
                            $catWiseNewsData = $catWiseNewsData->paginate(9);
                     

                         
                    


        return view('livewire.frontend.category.view-category',[
            'catWiseNewsData' =>$catWiseNewsData , 
         
         
        ])->layout('layouts.app');
    }
}
