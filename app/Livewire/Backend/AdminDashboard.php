<?php

namespace App\Livewire\Backend;

use App\Models\NewsPost;
use Livewire\Component;
use Carbon\Carbon;

class AdminDashboard extends Component
{
    
    public $monthlyCounts ;
    public function render()
    {

        $this->monthlyCounts = NewsPost::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'ASC')
        ->get();

        $this->dispatch('updatePieChart',  $this->monthlyCounts);
        // $this->dispatch('updatePieChart', $this->monthlyCounts->toArray());

        // $this->monthlyCounts = NewsPost::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
        // ->whereYear('created_at', $currentYear)
        // ->groupBy('year', 'month')
        // ->orderBy('year', 'desc')
        // ->orderBy('month', 'desc')
        // ->get();

        $totalyearCounts = NewsPost::selectRaw('YEAR(created_at) as year, COUNT(*) as count')
        ->groupBy('year')
        ->orderBy('year', 'desc')
        ->get();



        $monthyearCounts = NewsPost::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'ASC')
        ->get();
        $modifiedCounts = [];

        // Iterate over each year
        foreach ($monthyearCounts as $monthlyCount) {
            // Extract the year and month from the record
            $year = $monthlyCount->year;
            $month = $monthlyCount->month;
        
            // Initialize the count for the current month
            $count = $monthlyCount->count;
        
            // Ensure the year exists in the modified array
            if (!isset($modifiedCounts[$year])) {
                $modifiedCounts[$year] = [];
            }
        
            // Add the count for the current month to the modified array
            $modifiedCounts[$year][$month] = $count;
        }
        return view('livewire.backend.admin-dashboard' ,['modifiedCounts' =>$modifiedCounts ,'totalyearCounts' => $totalyearCounts]);
    }
}
