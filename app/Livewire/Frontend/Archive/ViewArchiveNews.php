<?php

namespace App\Livewire\Frontend\Archive;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class ViewArchiveNews extends Component
{

  
public $language_Val;
public $archivePosts;
    public function mount($id)
    {
        $this->language_Val = session()->get('language');
   
        $this->archivePosts = NewsPost::with(['newstype', 'user', 'getmenu'])->whereMonth('created_at', $id)
            ->orderBy('created_at', 'desc')
                    ->orderByRaw('RAND()');
                    switch ($this->language_Val) {
                        case 'hindi':
                             $this->archivePosts->where('news_type', 1);
                            break;
                    
                        case 'english':
                             $this->archivePosts->where('news_type', 2);
                            break;
                    
                        case 'punjabi':
                             $this->archivePosts->where('news_type', 3);
                            break;
                    
                        case 'urdu':
                             $this->archivePosts->where('news_type', 4);
                            break;
                    
                        default:
                        $this->archivePosts->where('news_type', 1);
                            // Handle the default case if needed
                    }
              
                    $this->archivePosts =  $this->archivePosts->paginate(9);
          
    }

    public function render()
    {

  
        return view('livewire.frontend.archive.view-archive-news' ,['archivePosts' =>$this->archivePosts] );
    }
}
