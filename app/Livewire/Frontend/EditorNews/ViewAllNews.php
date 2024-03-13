<?php

namespace App\Livewire\Frontend\EditorNews;

use App\Models\Advertisment;
use App\Models\NewsPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class ViewAllNews extends Component
{
    use WithPagination;
    public $language_Val;
    
     public function mount(){
          $this->language_Val = session()->get('language');  
        
        }
    public function render()
    {


        $catWiseNewsData = NewsPost::with(['newstype', 'user', 'getmenu'])
            ->whereHas('user', function ($query) {
                $query->whereHas('roles', function ($subquery) {
                    $subquery->where('name', 'admin');
                });
            })
     
            ->latest();

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
        $today = now()->toDateString();
        $reporter_newsAdd = Advertisment::where('from_date', '<=', $today)
                           ->where('to_date', '>=', $today)
                           ->where('location','Center Banner')
                           ->where('page_name' ,'Reporter_news')
                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                           ->orderBy('created_at', 'desc')
                          
                           ->first();
    

        return view('livewire.frontend.editor-news.view-all-news',[
            'catWiseNewsData' =>$catWiseNewsData,
            'reporter_newsAdd' => $reporter_newsAdd,
          
        ]);
    }
}
