<?php

namespace App\Livewire\Frontend\Innerpage;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class ViewInnerPage extends Component
{

// Declare a public property to store the $id parameter
public $news_id;
        public function mount($newsid){
            $getNewdInfo=   NewsPost::findOrFail($newsid); 
            $this->news_id = $getNewdInfo->id;

            
           
        }
    public function render()
    {
        $recmendNewsData = NewsPost::with('getmenu', 'newstype') 
        ->where('status', 'Approved') ->whereNull('deleted_at')
        ->where(function ($query) {
            $query->whereIn('breaking_top', ['Show'])
            ->orwhere('id'  ,$this->news_id)
            ;})
        ->orderBy('created_at', 'desc')
        ->limit(6)
        ->get();    
        $GetNewsDetail = NewsPost::with('getmenu', 'newstype')->where('id' ,  $this->news_id  )
        ->where('status', 'Approved') ->whereNull('deleted_at')->first();    
        return view('livewire.frontend.innerpage.view-inner-page' ,[  'recmendNewsData' =>$recmendNewsData , 'GetNewsDetail' => $GetNewsDetail])->layout('layouts.app');
    }
}
