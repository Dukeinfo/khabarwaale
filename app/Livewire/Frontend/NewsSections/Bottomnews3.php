<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class Bottomnews3 extends Component
{
    public function render()
    {
        
        $get_bottom3_Menus = Category::orderBy('sort_id', 'ASC')
                ->where('status', 'Active')->where('sort_id' ,7)->whereNull('deleted_at')->first();
                
            $seven_CatWise_HindiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
            ->where(function ($query)  {
                $query->whereHas('getmenu', function ($subquery)  {
                    $subquery->where('sort_id', 'like', '%' . '7' . '%');

                });
            })->orderBy('created_at', 'desc')
                ->orderBy('updated_at', 'desc')
                ->where('category_id' ,$get_bottom3_Menus->id)
                ->limit(4)->where('news_type' ,1)->get();


            $seven_CatWise_EngNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                ->where(function ($query)  {
                                    $query->whereHas('getmenu', function ($subquery)  {
                                        $subquery->where('sort_id', 'like', '%' . '7' . '%');
                    
                                    });
                                })->orderBy('created_at', 'desc')
                                    ->orderBy('updated_at', 'desc')
                                    ->where('category_id' ,$get_bottom3_Menus->id)
                                    ->limit(4)->where('news_type' ,2)->get();


            $seven_CatWise_PbiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                    ->where(function ($query)  {
                                        $query->whereHas('getmenu', function ($subquery)  {
                                            $subquery->where('sort_id', 'like', '%' . '7' . '%');
                        
                                        });
                                    })->orderBy('created_at', 'desc')
                                        ->orderBy('updated_at', 'desc')
                                        ->where('category_id' ,$get_bottom3_Menus->id)
                                        ->limit(4)->where('news_type' ,3)->get();



            $seven_CatWise_UrduNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                    ->where(function ($query)  {
                                        $query->whereHas('getmenu', function ($subquery)  {
                                            $subquery->where('sort_id', 'like', '%' . '7' . '%');
                                        });
                                        })->orderBy('created_at', 'desc')
                                        ->orderBy('updated_at', 'desc')
                                        ->where('category_id' ,$get_bottom3_Menus->id)
                                        ->limit(4)->where('news_type' ,4)->get();
        return view('livewire.frontend.news-sections.bottomnews3',[
                    'get_bottom3_Menus' =>$get_bottom3_Menus ,
                    'seven_CatWise_HindiNews' => $seven_CatWise_HindiNews,
                    'seven_CatWise_EngNews' => $seven_CatWise_EngNews,
                    'seven_CatWise_PbiNews' => $seven_CatWise_PbiNews,
                    'seven_CatWise_UrduNews' => $seven_CatWise_UrduNews,
        ]);
    }
}
