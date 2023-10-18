<?php

namespace App\Livewire\Frontend\CategoryNews;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class ThirdCategoryNews extends Component
{
    public function render()
    {
        $getMenus = Category::orderBy('sort_id', 'ASC')
                    ->where('status', 'Active')->where('sort_id' ,3)->whereNull('deleted_at')->first();
                    
        $thirdCatWiseHindiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                        ->where(function ($query)  {
                            $query->whereHas('getmenu', function ($subquery)  {
                                $subquery->where('sort_id', 'like', '%' . '3' . '%');

                            });
                            })->orderBy('created_at', 'desc')
                                ->orderBy('updated_at', 'desc')
                                ->where('category_id' ,$getMenus->id)
                                ->limit(4)->where('news_type' ,1)->get();


        $thirdCatWise_EngNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                        ->where(function ($query)  {
                            $query->whereHas('getmenu', function ($subquery)  {
                                $subquery->where('sort_id', 'like', '%' . '3' . '%');

                            });
                        })->orderBy('created_at', 'desc')
                            ->orderBy('updated_at', 'desc')
                            ->where('category_id' ,$getMenus->id)
                            ->limit(4)->where('news_type' ,2)->get();


        $thirdCatWise_PbiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                            ->where(function ($query)  {
                                $query->whereHas('getmenu', function ($subquery)  {
                                    $subquery->where('sort_id', 'like', '%' . '3' . '%');
                                });
                            })->orderBy('created_at', 'desc')
                                ->orderBy('updated_at', 'desc')
                                ->where('category_id' ,$getMenus->id)
                                ->limit(4)->where('news_type' ,3)->get();



            $thirdCatWise_UrduNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                ->where(function ($query)  {
                                    $query->whereHas('getmenu', function ($subquery)  {
                                        $subquery->where('sort_id', 'like', '%' . '3' . '%');
                                    });
                                })->orderBy('created_at', 'desc')
                                    ->orderBy('updated_at', 'desc')
                                    ->where('category_id' ,$getMenus->id)
                                    ->limit(4)->where('news_type' ,4)->get();
        return view('livewire.frontend.category-news.third-category-news' ,[
            'thirdCatWiseHindiNews' => $thirdCatWiseHindiNews,
            'thirdCatWise_EngNews' => $thirdCatWise_EngNews,
            'thirdCatWise_PbiNews' => $thirdCatWise_PbiNews,
            'thirdCatWise_UrduNews' => $thirdCatWise_UrduNews,
              'getMenus'=> $getMenus]);
    }
}
