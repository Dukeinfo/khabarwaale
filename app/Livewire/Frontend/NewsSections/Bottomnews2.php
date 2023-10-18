<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class Bottomnews2 extends Component
{
    public function render()
    {
        $get_bottom2_Menus = Category::orderBy('sort_id', 'ASC')
                            ->where('status', 'Active')->where('sort_id' ,6)->whereNull('deleted_at')->first();

            $six_CatWise_HindiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
            ->where(function ($query)  {
                $query->whereHas('getmenu', function ($subquery)  {
                    $subquery->where('sort_id', 'like', '%' . '6' . '%');

                });
            })->orderBy('created_at', 'desc')
                ->orderBy('updated_at', 'desc')
                ->where('category_id' ,$get_bottom2_Menus->id)
                ->limit(4)->where('news_type' ,1)->get();


            $six_CatWise_EngNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                ->where(function ($query)  {
                                    $query->whereHas('getmenu', function ($subquery)  {
                                        $subquery->where('sort_id', 'like', '%' . '6' . '%');
                    
                                    });
                                })->orderBy('created_at', 'desc')
                                    ->orderBy('updated_at', 'desc')
                                    ->where('category_id' ,$get_bottom2_Menus->id)
                                    ->limit(4)->where('news_type' ,2)->get();


            $six_CatWise_PbiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                    ->where(function ($query)  {
                                        $query->whereHas('getmenu', function ($subquery)  {
                                            $subquery->where('sort_id', 'like', '%' . '6' . '%');
                        
                                        });
                                    })->orderBy('created_at', 'desc')
                                        ->orderBy('updated_at', 'desc')
                                        ->where('category_id' ,$get_bottom2_Menus->id)
                                        ->limit(4)->where('news_type' ,3)->get();



            $six_CatWise_UrduNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                    ->where(function ($query)  {
                                        $query->whereHas('getmenu', function ($subquery)  {
                                            $subquery->where('sort_id', 'like', '%' . '6' . '%');
                                        });
                                        })->orderBy('created_at', 'desc')
                                        ->orderBy('updated_at', 'desc')
                                        ->where('category_id' ,$get_bottom2_Menus->id)
                                        ->limit(4)->where('news_type' ,4)->get();
        return view('livewire.frontend.news-sections.bottomnews2',[
                'get_bottom2_Menus' =>$get_bottom2_Menus ,
                'six_CatWise_HindiNews' => $six_CatWise_HindiNews,
                'six_CatWise_EngNews' => $six_CatWise_EngNews,
                'six_CatWise_PbiNews' => $six_CatWise_PbiNews,
                'six_CatWise_UrduNews' => $six_CatWise_UrduNews,
          

        ]);
    }
}
