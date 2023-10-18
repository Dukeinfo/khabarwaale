<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Attributes\Url;
use Livewire\Component;

class BottomNews extends Component
{ 
    

    public function render()
    {
        $get_bottom1_Menus = Category::orderBy('sort_id', 'ASC')
                ->where('status', 'Active')->where('sort_id' ,5)->whereNull('deleted_at')->first();
        $five_CatWise_HindiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                ->where(function ($query)  {
                    $query->whereHas('getmenu', function ($subquery)  {
                        $subquery->where('sort_id', 'like', '%' . '5' . '%');

                    });
                })->orderBy('created_at', 'desc')
                    ->orderBy('updated_at', 'desc')
                    ->where('category_id' ,$get_bottom1_Menus->id)
                    ->limit(4)->where('news_type' ,1)->get();


        $five_CatWise_EngNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                            ->where(function ($query)  {
                                $query->whereHas('getmenu', function ($subquery)  {
                                    $subquery->where('sort_id', 'like', '%' . '5' . '%');
                
                                });
                            })->orderBy('created_at', 'desc')
                                ->orderBy('updated_at', 'desc')
                                ->where('category_id' ,$get_bottom1_Menus->id)
                                ->limit(4)->where('news_type' ,2)->get();


        $five_CatWise_PbiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                ->where(function ($query)  {
                                    $query->whereHas('getmenu', function ($subquery)  {
                                        $subquery->where('sort_id', 'like', '%' . '5' . '%');
                    
                                    });
                                  })->orderBy('created_at', 'desc')
                                    ->orderBy('updated_at', 'desc')
                                    ->where('category_id' ,$get_bottom1_Menus->id)
                                    ->limit(4)->where('news_type' ,3)->get();



        $five_CatWise_UrduNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                ->where(function ($query)  {
                                    $query->whereHas('getmenu', function ($subquery)  {
                                        $subquery->where('sort_id', 'like', '%' . '5' . '%');
                                    });
                                    })->orderBy('created_at', 'desc')
                                    ->orderBy('updated_at', 'desc')
                                    ->where('category_id' ,$get_bottom1_Menus->id)
                                    ->limit(4)->where('news_type' ,4)->get();
        return view('livewire.frontend.news-sections.bottom-news' ,[
                    'get_bottom1_Menus' =>$get_bottom1_Menus ,
                    'five_CatWise_HindiNews' => $five_CatWise_HindiNews,
                    'five_CatWise_EngNews' => $five_CatWise_EngNews,
                    'five_CatWise_PbiNews' => $five_CatWise_PbiNews,
                    'five_CatWise_UrduNews' => $five_CatWise_UrduNews,
          
 

        ]);
    }
}
