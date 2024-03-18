<?php

namespace App\Livewire\Frontend\Homepage;

use App\Models\Advertisment;
use App\Models\ArchiveNews;
use Livewire\Component;

class HomeTopAdd extends Component
{
    public function render()
    {

        $today = now()->toDateString();
        $homeTopAdd = Advertisment::where('from_date', '<=', $today)
                           ->where('to_date', '>=', $today)
                           ->where('location','Top Banner')
                           ->where('page_name' ,'Homepage')
                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                           ->orderBy('created_at', 'desc')
                           ->limit(3)
                           ->get();
 

                        $getArchiveDate =  ArchiveNews::where('status' ,'Active')->first();
                        $archiveDate = $getArchiveDate ? $getArchiveDate->archived_at : now()->toDateString();

                    $homeTopArchiveAdd  =  Advertisment::where(function ($query) use ($archiveDate) {
                        $query->where(function ($query) use ($archiveDate) {
                                $query->where('from_date', '<=', $archiveDate)
                                    ->where('to_date', '>=', $archiveDate);
                            })->orWhere(function ($query) use ($archiveDate) {
                                $query->where('from_date', '=', $archiveDate);
                            });
                        })
                        ->whereDate('created_at', '<=', $archiveDate) 
                        ->where('location','Top Banner')
                        ->where('page_name', 'Homepage')
                        ->where('status', 'Yes')
                        ->latest()
                        ->limit(3)
                        ->get();

        return view('livewire.frontend.homepage.home-top-add' ,[
                        'homeTopAdd' =>$homeTopAdd ,
                        'homeTopArchiveAdd' =>$homeTopArchiveAdd 
                        ]);
    }
}
