<?php

namespace App\Livewire\Frontend\Category;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class ViewCategory extends Component
{

public $categoryId ,$category_en, $category_hin ,$category_pbi  ,$category_urdu;
public function mount(  $id){
    $getCategory  =  Category::where('id' ,$id)->orderby('sort_id','ASC')->where('status' ,'Active')->where('deleted_at',Null)->first();
    $this->categoryId = $getCategory->id;
    $this->category_en =  $getCategory->category_en;
    $this->category_hin =  $getCategory->category_hin;
    $this->category_pbi =  $getCategory->category_pbi;
    $this->category_urdu =  $getCategory->category_urdu;
  
}

    public function render()
    {
        $catWiselatestNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                    ->where(function ($query)  {
                                            $query->whereHas('getmenu', function ($subquery)  {
                                            $subquery->where('id', 'like', '%' . $this->categoryId . '%')
                                            ->orwhereIn('breaking_side', ['Show']);
                                        }); })->orderBy('created_at', 'desc') ->orderBy('updated_at', 'desc')->orderByRaw('RAND()')->limit(6)->get(); 

        
        $catWiseNewsData  = NewsPost::with(['newstype', 'user', 'getmenu'])
                                    ->where(function ($query)  {
                                        $query->whereHas('getmenu', function ($subquery)  {
                                            $subquery->where('id', 'like', '%' . $this->categoryId . '%')
                                           ;
                                        });
                                    })->orderBy('created_at', 'desc') ->orderBy('updated_at', 'desc')->get();
        return view('livewire.frontend.category.view-category',[
            'catWiseNewsData' =>$catWiseNewsData , 
              'catWiselatestNews' =>$catWiselatestNews
        ])->layout('layouts.app');
    }
}
