<?php

namespace App\Livewire\Frontend\CategoryNews;

use App\Mail\Websitemail;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
        try {
            $this->validate([
                'email' => 'required|email|unique:subscriptions,email',
            ]);

            $token = hash('sha256', time());

            $subscriber = new Subscription();
            $subscriber->email = $this->email;
            $subscriber->token = $token;
            $subscriber->status = 'Pending';
            $subscriber->ip = getUserIp();

            if ($subscriber->save()) {
                $subject = 'Please Confirm Subscription';
                $verification_link = url('subscriber/verify/' . $token . '/' . $this->email);
                $message = 'Please click on the following link in order to verify as a subscriber:<br><br>';
                $message .= '<a href="' . $verification_link . '">' .'Verify Email Address '. '</a><br><br>';
                $message .= 'If you received this email by mistake, simply delete it. You will not be subscribed if you do not click the confirmation link above.';
                Mail::to($this->email)->send(new Websitemail($subject, $message));
                session()->flash('success', 'Thanks, please check your inbox to confirm the subscription');
            } else {
                session()->flash('error', 'Something went wrong, please try again.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the subscription process
            session()->flash('error', 'An error occurred. Please try again later.');
            // You can log the error for debugging purposes if needed
            Log::error($e);
        }
               

    }
}
