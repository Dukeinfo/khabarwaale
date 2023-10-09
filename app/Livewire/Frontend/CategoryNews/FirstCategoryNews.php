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

        $getMenus  =  Category::orderby('sort_id','ASC')->where('status' ,'Active')->where('deleted_at',Null)->get();

        $catWiseNews = NewsPost::with(['newstype', 'user', 'getmenu'])
        ->where(function ($query)  {
            $query->whereHas('getmenu', function ($subquery)  {
                $subquery->where('sort_id', 'like', '%' . '1' . '%');
            });
        })->orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc')
        ->orderByRaw('RAND()')
        ->limit(4)
        ->get();
        return view('livewire.frontend.category-news.first-category-news',['catWiseNews' => $catWiseNews ,'getMenus' =>$getMenus]);
    }
}
