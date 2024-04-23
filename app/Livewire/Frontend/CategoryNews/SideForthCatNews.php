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
use Illuminate\Support\Facades\Cache;
class SideForthCatNews extends Component
{
    use LivewireAlert;
    public $email;

    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }
 

    public function render()
    {


        $getMenus = Cache::remember('forth_category_news_menus', now()->addMinutes(5), function () {
            return Category::orderBy('sort_id', 'ASC')
                            ->where('status', 'Active')
                            ->where('sort_id', 5)
                            ->whereNull('deleted_at')
                            ->first();
        });


        $categoryIds = explode(',', $getMenus->id);

        // Use caching to store the result of the query for $fourthCatWise_News
        $fourthCatWise_News = Cache::remember('forth_category_news_posts_' . $this->languageVal, now()->addMinutes(5), function () use ($categoryIds) {
            return NewsPost::select('id', 'slug', 'news_type', 'category_id', 'user_id', 'title', 'slug', 'heading',  'image', 'thumbnail'
            ,'status' ,'deleted_at'   ,'breaking_side' ,  'created_at','updated_at')
            ->with(['newstype', 'user', 'getmenu'])
                            ->where(function ($query) use ($categoryIds) {
                                // Check if category_id contains any of the provided IDs
                                $query->where(function ($subquery) use ($categoryIds) {
                                    foreach ($categoryIds as $categoryId) {
                                        $subquery->orWhere('category_id', 'like', "%$categoryId%");
                                    }
                                });
                            })
                            ->orderBy('created_at', 'desc')
                            ->orderBy('updated_at', 'desc')
                            ->where('news_type', $this->getNewsType())
                            ->limit(4)
                            ->get();
        });
 
        return view('livewire.frontend.category-news.side-forth-cat-news' ,[
                    'fourthCatWise_News' => $fourthCatWise_News,
                    'getMenus' => $getMenus
            ]
         );
    }

    private function getNewsType()
    {
        switch ($this->languageVal) {
            case 'hindi':
                return 1;
                break;
            case 'english':
                return 2;
                break;
            case 'punjabi':
                return 3;
                break;
            case 'urdu':
                return 4;
                break;
            default:
                return 1;
                // Handle the default case if needed
        }
    }

    public function subscribe()
    {
       
            $this->validate([
                'email' => 'required|email|unique:subscriptions,email',
            ]);
            try {
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
