<?php

namespace App\Livewire\Frontend\EditorNews;

use App\Models\NewsPost;
use Livewire\Component;
use Livewire\WithPagination;

class ViewAllNews extends Component
{
    use WithPagination;
    public $language_Val;
    
     public function mount(){
          $this->language_Val = session()->get('language');  
        
        }
    public function render()
    {
        $catWiseNewsData  = NewsPost::with(['newstype', 'user', 'getmenu'])
        ->where(function ($query) {
            $query->whereHas('user', function ($subquery) {
                $subquery->where('role_id',  2);
                    // ->orwhereIn('breaking_side', ['Show']);
            });
        })
        ->orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc');
        switch ($this->language_Val) {
            case 'hindi':
                $catWiseNewsData->where('news_type', 1);
                break;
        
            case 'english':
                $catWiseNewsData->where('news_type', 2);
                break;
        
            case 'punjabi':
                $catWiseNewsData->where('news_type', 3);
                break;
        
            case 'urdu':
                $catWiseNewsData->where('news_type', 4);
                break;
        
            default:
              $catWiseNewsData->where('news_type', 1);
                // Handle the default case if needed
        }
        
        $catWiseNewsData = $catWiseNewsData->paginate(9);

        return view('livewire.frontend.editor-news.view-all-news',[
            'catWiseNewsData' =>$catWiseNewsData,
        ]);
    }
}
