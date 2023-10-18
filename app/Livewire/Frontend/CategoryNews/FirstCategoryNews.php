<?php

namespace App\Livewire\Frontend\CategoryNews;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Attributes\Url;
use Livewire\Component;

class FirstCategoryNews extends Component
{
    #[Url(history: true)]
    public function render()
    {
                $getMenus = Category::orderBy('sort_id', 'ASC')
                            ->where('status', 'Active')->where('sort_id' ,1)->whereNull('deleted_at')->first();
                $catWiseHinNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                        ->where(function ($query)  {
                            $query->whereHas('getmenu', function ($subquery)  {
                                $subquery->where('sort_id', 'like', '%' . '1' . '%');

                            });
                        })->orderBy('created_at', 'desc')
                        ->orderBy('updated_at', 'desc')
                        ->where('category_id' ,$getMenus->id)
                         ->limit(4)->where('news_type' ,1)->get();
                        
                $catWiseEngNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                        ->where(function ($query)  {
                            $query->whereHas('getmenu', function ($subquery)  {
                                $subquery->where('sort_id', 'like', '%' . '1' . '%');
                            });
                        })->orderBy('created_at', 'desc')
                        ->orderBy('updated_at', 'desc')->where('category_id' ,$getMenus->id)->limit(4)->where('news_type' ,2)->get();

     

                $catWisePbiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                        ->where(function ($query)  {
                            $query->whereHas('getmenu', function ($subquery)  {
                                $subquery->where('sort_id', 'like', '%' . '1' . '%');
                            });
                        })->orderBy('created_at', 'desc')
                        ->orderBy('updated_at', 'desc')->where('category_id' ,$getMenus->id)->limit(4)->where('news_type' ,3)->get();

                $catWiseUrduNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                        ->where(function ($query)  {
                            $query->whereHas('getmenu', function ($subquery)  {
                                $subquery->where('sort_id', 'like', '%' . '1' . '%');
                            });
                        })->orderBy('created_at', 'desc')
                        ->orderBy('updated_at', 'desc')->where('category_id' ,$getMenus->id)->limit(4)->where('news_type' ,4)->get();
        return view('livewire.frontend.category-news.first-category-news',[
                        'getMenus' =>$getMenus,
                        'catWiseEngNews' => $catWiseEngNews ,
                        'catWiseHinNews' => $catWiseHinNews ,
                        'catWisePbiNews' => $catWisePbiNews ,
                        'catWiseUrduNews' => $catWiseUrduNews ,

        
        ]);
    }
}
