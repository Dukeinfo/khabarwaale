<?php

namespace App\Livewire\Frontend\Archive;

use App\Models\NewsPost;
use Livewire\Component;
use Carbon\Carbon;
class ViewArchive extends Component
{

    public $languageVal;
    public $monthlyCounts;
    
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
        return view('livewire.frontend.archive.view-archive' );
    }
}
