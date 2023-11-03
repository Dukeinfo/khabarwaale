<?php

namespace App\Livewire\Frontend\NewsSections;

use App\Models\Advertisment;
use App\Models\NewsPost;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class TopNews extends Component
{

  
    public $languageVal;
    public function mount(){ 
          $this->languageVal = session()->get('language');
    
    }



    public function render()
    {    
                 $top_NewsData = NewsPost::with('getmenu', 'newstype') 
                                ->where('status', 'Approved') ->whereNull('deleted_at')
                                ->where(function ($query) { $query->whereIn('breaking_top', ['Show']);})
                                ->orderBy('created_at', 'desc')
                                ;
                switch ($this->languageVal) {
                    case 'hindi':
                        $top_NewsData->where('news_type', 1);
                        break;
                
                    case 'english':
                        $top_NewsData->where('news_type', 2);
                        break;
                
                    case 'punjabi':
                        $top_NewsData->where('news_type', 3);
                        break;
                
                    case 'urdu':
                        $top_NewsData->where('news_type', 4);
                        break;
                
                    default:
                    $top_NewsData->where('news_type', 1);
                        // Handle the default case if needed
                }
    
                 $top_NewsData = $top_NewsData->limit(7)->get();

                $today = now()->toDateString();
                $topNewsCentertAds = Advertisment::where('from_date', '<=', $today)
                                    ->where('to_date', '>=', $today)
                                    ->where('location','Under Top News')
                                    ->where('page_name' ,'Homepage')
                                    ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                                    ->orderBy('created_at', 'desc')
                                    ->first();
            return view('livewire.frontend.news-sections.top-news' ,[
                'top_NewsData' => $top_NewsData,
                'topNewsCentertAds' => $topNewsCentertAds,
            ]);
    }
}
