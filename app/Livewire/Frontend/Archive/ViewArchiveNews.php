<?php

namespace App\Livewire\Frontend\Archive;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;

class ViewArchiveNews extends Component
{

    use WithPagination;
  
public $languageVal ;
public $archivemonth ,$archiveyear; 

public $year;


    public function mount($id, Request $request )
    {
        $this->languageVal = session()->get('language');
        $this->archivemonth =  $id;
          // Get the year from the query parameters
        $this->archiveyear = $request->query('year');
   
          
    }

    public function render()
    {
        $archivePosts = NewsPost::with(['newstype', 'getmenu'])->whereMonth('created_at',$this->archivemonth )
        ->whereYear('created_at', $this->archiveyear)
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc');
            
            switch ($this->languageVal) {
                case 'hindi':
                    $archivePosts->where('news_type', 1);
                    break;
            
                case 'english':
                    $archivePosts->where('news_type', 2);
                    break;
            
                case 'punjabi':
                    $archivePosts->where('news_type', 3);
                    break;
            
                case 'urdu':
                    $archivePosts->where('news_type', 4);
                    break;
            
                default:
                  $archivePosts->where('news_type', 1);
                    // Handle the default case if needed
            }
            
            $archivelatest_News = $archivePosts->limit(10)->get();
         
           
            $archivePosts =  $archivePosts->paginate(9);

            $archiveMonthPost = NewsPost::with(['newstype', 'getmenu'])
            ->whereMonth('created_at', $this->archivemonth)
            ->first();
        
            if ($archiveMonthPost) {
                $archiveMonthName = Carbon::parse($archiveMonthPost->created_at)->format('F');
        
            } 

        return view('livewire.frontend.archive.view-archive-news' ,
        [
            'archivePosts' => $archivePosts , 
            'archiveMonthName' => $archiveMonthName,
            'archivelatest_News' =>$archivelatest_News,
        ]);
    }

    
    #[On('datasending')] 
     public function datasending($newsData){
         
         Log::info('Data recived ' ,$newsData);
        
     }
    

}
