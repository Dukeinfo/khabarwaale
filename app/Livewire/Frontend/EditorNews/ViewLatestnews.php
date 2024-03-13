<?php

namespace App\Livewire\Frontend\EditorNews;

use App\Models\Advertisment;
use App\Models\NewsPost;
use App\Models\User;
use Livewire\Component;

class ViewLatestnews extends Component
{

public $languageVal;
    
     public function mount(){
          $this->languageVal = session()->get('language');  
      
        }

    public function render()
    {

        // $EditorNewsLatest = NewsPost::with(['newstype', 'user', 'getmenu'])
        // ->where(function ($query) {
        //     $query->whereHas('user', function ($subquery) {
        //         $subquery->where('role_id',  23);
        //             // ->orwhereIn('breaking_side', ['Show']);
        //     });
        // })
        $EditorNewsLatest = NewsPost::with(['newstype', 'user', 'getmenu'])
        ->whereHas('user', function ($query) {
            $query->whereHas('roles', function ($subquery) {
                $subquery->where('name', 'admin');
            });
        })

        ->latest()
        ->orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc');
    
    switch ($this->languageVal) {
        case 'hindi':
            $EditorNewsLatest->where('news_type', 1);
            break;
    
        case 'english':
            $EditorNewsLatest->where('news_type', 2);
            break;
    
        case 'punjabi':
            $EditorNewsLatest->where('news_type', 3);
            break;
    
        case 'urdu':
            $EditorNewsLatest->where('news_type', 4);
            break;
    
        default:
          $EditorNewsLatest->where('news_type', 1);
            // Handle the default case if needed
    }
    
            $EditorNewsLatest = $EditorNewsLatest->limit(6)->get();
         
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
