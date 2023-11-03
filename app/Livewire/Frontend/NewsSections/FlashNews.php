<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\NewsPost;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Carbon;

class FlashNews extends Component
{

    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }




    public function render()
    {
        $today = Carbon::now()->toDateString();
        $newsPosts = NewsPost::with('getmenu', 'newstype', 'user')
            ->where('status', 'Approved')
            ->whereNull('deleted_at')
            ->where(function ($query) use ($today) {
                $query->where('post_date', $today) // Match the current date
                    ->orWhere(function ($query) {
                        $query->whereIn('breaking_side', ['Show'])
                            ->orWhereIn('breaking_top', ['Show'])
                            ->orWhereIn('slider', ['Show']);
                    });
            });
       // Limit the number of results to 6
        
                switch ($this->languageVal) {
                    case 'hindi':
                        $newsPosts->where('news_type', 1);
                        break;
                
                    case 'english':
                        $newsPosts->where('news_type', 2);
                        break;
                
                    case 'punjabi':
                        $newsPosts->where('news_type', 3);
                        break;
                
                    case 'urdu':
                        $newsPosts->where('news_type', 4);
                        break;
                
                    default:
                    $newsPosts->where('news_type', 1);
                        // Handle the default case if needed
                }
    
            $newsPosts = $newsPosts->orderBy('created_at', 'desc')
                                    ->orderBy('created_at', 'desc')
                                    ->take(6)
                                    ->get();      
                                
        return view('livewire.frontend.news-sections.flash-news' ,['newsPosts' => $newsPosts]);
    }
}
