<?php

namespace App\Livewire\Frontend\CategoryNews;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class SecondCategoryNews extends Component
{
    public function render()
    {

        $getMenus = Category::orderBy('sort_id', 'ASC')
                    ->where('status', 'Active')->where('sort_id' ,2)->whereNull('deleted_at')->first();
         $secondCatWiseHindiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                    ->where(function ($query)  {
                        $query->whereHas('getmenu', function ($subquery)  {
                            $subquery->where('sort_id', 'like', '%' . '2' . '%');

                        });
                    })->orderBy('created_at', 'desc')
                        ->orderBy('updated_at', 'desc')
                        ->where('category_id' ,$getMenus->id)
                        ->limit(4)->where('news_type' ,1)->get();


        $secondCatWise_EngNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                ->where(function ($query)  {
                                    $query->whereHas('getmenu', function ($subquery)  {
                                        $subquery->where('sort_id', 'like', '%' . '2' . '%');
                    
                                    });
                                })->orderBy('created_at', 'desc')
                                    ->orderBy('updated_at', 'desc')
                                    ->where('category_id' ,$getMenus->id)
                                    ->limit(4)->where('news_type' ,2)->get();


        $secondCatWise_PbiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                    ->where(function ($query)  {
                                        $query->whereHas('getmenu', function ($subquery)  {
                                            $subquery->where('sort_id', 'like', '%' . '2' . '%');
                        
                                        });
                                      })->orderBy('created_at', 'desc')
                                        ->orderBy('updated_at', 'desc')
                                        ->where('category_id' ,$getMenus->id)
                                        ->limit(4)->where('news_type' ,3)->get();



         $secondCatWise_UrduNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                    ->where(function ($query)  {
                                        $query->whereHas('getmenu', function ($subquery)  {
                                            $subquery->where('sort_id', 'like', '%' . '2' . '%');
                                        });
                                        })->orderBy('created_at', 'desc')
                                        ->orderBy('updated_at', 'desc')
                                        ->where('category_id' ,$getMenus->id)
                                        ->limit(4)->where('news_type' ,4)->get();
        return view('livewire.frontend.category-news.second-category-news' ,[
            'secondCatWiseHindiNews' => $secondCatWiseHindiNews,
            'secondCatWise_EngNews' => $secondCatWise_EngNews,
            'secondCatWise_PbiNews' => $secondCatWise_PbiNews,
            'secondCatWise_UrduNews' => $secondCatWise_UrduNews,
              'getMenus'=> $getMenus]);
    }
}
