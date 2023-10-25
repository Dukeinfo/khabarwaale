<?php

namespace App\Livewire\Frontend\CategoryNews;

use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subscription;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SideForthCatNews extends Component
{
    use LivewireAlert;
    public $email;
    public function render()
    {
        $getMenus = Category::orderBy('sort_id', 'ASC')
                    ->where('status', 'Active')->where('sort_id' ,4)->whereNull('deleted_at')->first();
        $fourthCatWise_HindiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                    ->where(function ($query)  {
                        $query->whereHas('getmenu', function ($subquery)  {
                            $subquery->where('sort_id', 'like', '%' . '4' . '%');

                        });
                    })->orderBy('created_at', 'desc')
                        ->orderBy('updated_at', 'desc')
                        ->where('category_id' ,$getMenus->id)
                        ->limit(4)->where('news_type' ,1)->get();


        $fourthCatWise_EngNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                ->where(function ($query)  {
                                    $query->whereHas('getmenu', function ($subquery)  {
                                        $subquery->where('sort_id', 'like', '%' . '4' . '%');
                    
                                    });
                                })->orderBy('created_at', 'desc')
                                    ->orderBy('updated_at', 'desc')
                                    ->where('category_id' ,$getMenus->id)
                                    ->limit(4)->where('news_type' ,2)->get();


        $fourthCatWise_PbiNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                    ->where(function ($query)  {
                                        $query->whereHas('getmenu', function ($subquery)  {
                                            $subquery->where('sort_id', 'like', '%' . '4' . '%');
                        
                                        });
                                      })->orderBy('created_at', 'desc')
                                        ->orderBy('updated_at', 'desc')
                                        ->where('category_id' ,$getMenus->id)
                                        ->limit(4)->where('news_type' ,3)->get();



         $fourthCatWise_UrduNews = NewsPost::with(['newstype', 'user', 'getmenu'])
                                    ->where(function ($query)  {
                                        $query->whereHas('getmenu', function ($subquery)  {
                                            $subquery->where('sort_id', 'like', '%' . '4' . '%');
                                        });
                                        })->orderBy('created_at', 'desc')
                                        ->orderBy('updated_at', 'desc')
                                        ->where('category_id' ,$getMenus->id)
                                        ->limit(4)->where('news_type' ,4)->get();
        return view('livewire.frontend.category-news.side-forth-cat-news' ,[
                    'fourthCatWise_HindiNews' => $fourthCatWise_HindiNews,
                    'fourthCatWise_EngNews' => $fourthCatWise_EngNews,
                    'fourthCatWise_PbiNews' => $fourthCatWise_PbiNews,
                    'fourthCatWise_UrduNews' => $fourthCatWise_UrduNews,
                    'getMenus' => $getMenus
            ]
         );
    }

    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email|unique:subscriptions',
        ]);

        Subscription::create([
            'email' => $this->email,
            'ip' => getUserIp(),
            'status' => 'subscribed',
        ]);

        // Send a confirmation email
        session()->flash('success', 'Subscribed successfully!');
        $this->alert('success', 'Subscribed successfully!!');

    }
}
