<?php

namespace App\Livewire\Backend;

use App\Models\NewsPost;
use Livewire\Component;
use Carbon\Carbon;

class AdminDashboard extends Component
{
    
    public $monthlyCounts;
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

  
        return view('livewire.backend.admin-dashboard');
    }
}
