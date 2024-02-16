<?php

namespace App\Livewire\Frontend\Archive;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
class ViewArchive extends Component
{

    public $languageVal;
    public $monthlyCounts;
    public $monthSelect;

    public $categorySelect;
    public $fromDate;
    public $toDate;


        public function mount(){

            $this->languageVal = session()->get('language');
    
      
        }
    public function render()
    {
        // $archive_News = NewsPost::selectRaw('DATE_FORMAT(created_at, "%M %Y") as post_month, COUNT(*) as count')
        // ->groupBy('post_month')
        // ->orderBy('post_month', 'desc')
        // ->get();
        $currentYear = Carbon::now()->year;
        
        $this->monthlyCounts = NewsPost::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'ASC')
        ->get();
        // $this->monthlyCounts = NewsPost::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
        // ->whereYear('created_at', $currentYear)
        // ->groupBy('year', 'month')
        // ->orderBy('year', 'desc')
        // ->orderBy('month', 'desc')
        // ->get();

// category wise 
        // $this->monthlyCounts = NewsPost::selectRaw('category_id, YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
        // ->groupBy('category_id', 'year', 'month')
        // ->orderBy('year', 'desc')
        // ->orderBy('month', 'asc')
        // ->get();
        $getCategory = Category::orderBy('sort_id', 'ASC')
                        ->whereNotIn('sort_id', [1]) // Exclude categories with sort_id equal to 1
                        ->where('status', 'Active')
                        ->whereNull('deleted_at')
                        ->get();

        return view('livewire.frontend.archive.view-archive' ,['getCategory' =>$getCategory]);
    }
        public $newsData;
        public function submitArchive(){
    
            $this->newsData = NewsPost::whereBetween('created_at', [$this->fromDate, $this->toDate])
            ->orWhere('category_id', $this->categorySelect)
            ->where(function ($query) {
                switch ($this->languageVal) {
                    case 'hindi':
                        $query->where('news_type', 1);
                        break;
                    
                    case 'english':
                        $query->where('news_type', 2);
                        break;
                    
                    case 'punjabi':
                        $query->where('news_type', 3);
                        break;
                    
                    case 'urdu':
                        $query->where('news_type', 4);
                        break;
                    
                    default:
                        $query->where('news_type', 1);
                        // Handle the default case if needed
                }
            })
            ->get();
            $this->dispatch('datasending', newsData: $this->newsData);
            $this->reset();
            // return redirect('/');

        }
}
