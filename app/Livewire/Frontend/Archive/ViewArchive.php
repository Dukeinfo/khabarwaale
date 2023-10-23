<?php

namespace App\Livewire\Frontend\Archive;

use App\Models\NewsPost;
use Livewire\Component;

class ViewArchive extends Component
{

    public $languageVal;
    
        public function mount(){

            $this->languageVal = session()->get('language');
    
      
        }
    public function render()
    {
        $archive_News = NewsPost::selectRaw('DATE_FORMAT(created_at, "%M %Y") as post_month, COUNT(*) as count')
        ->groupBy('post_month')
        ->orderBy('post_month', 'desc')
        ->get();
    
    


        return view('livewire.frontend.archive.view-archive' ,['archive_News' => $archive_News]);
    }
}
