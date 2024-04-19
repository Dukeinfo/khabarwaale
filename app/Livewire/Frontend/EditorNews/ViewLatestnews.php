<?php

namespace App\Livewire\Frontend\EditorNews;

use App\Models\Advertisment;
use App\Models\NewsPost;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
class ViewLatestnews extends Component
{

public $languageVal;
    
     public function mount(){
          $this->languageVal = session()->get('language');  
      
        }

    public function render()
    {
        $cacheKey = 'editor_news_latest_' . $this->languageVal;
            $EditorNewsLatest = Cache::remember($cacheKey, now()->addMinutes(10), function () {
                return NewsPost::with(['newstype', 'user', 'getmenu'])
                    ->whereHas('user', function ($query) {
                        $query->whereHas('roles', function ($subquery) {
                            $subquery->where('name', 'admin');
                        });
                    })
                    ->latest()
                    ->when($this->languageVal, function ($query, $language) {
                        switch ($language) {
                            case 'hindi':
                                return $query->where('news_type', 1);
                            case 'english':
                                return $query->where('news_type', 2);
                            case 'punjabi':
                                return $query->where('news_type', 3);
                            case 'urdu':
                                return $query->where('news_type', 4);
                            default:
                                return $query->where('news_type', 1);
                        }
                    })
                    ->limit(6)
                    ->get();
            });
         
            $today = now()->toDateString();
            $editorlatestleftAds = Advertisment::where('from_date', '<=', $today)
                            ->where('to_date', '>=', $today)
                            ->where('location','Left Add')
                            ->where('page_name' ,'Reporter_news')
                            ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                            ->orderBy('created_at', 'desc')
                            ->first();


                            
        return view('livewire.frontend.editor-news.view-latestnews' ,[
        'EditorNewsLatest' =>$EditorNewsLatest,
        'editorlatestleftAds' => $editorlatestleftAds

    ]);
    }
}
