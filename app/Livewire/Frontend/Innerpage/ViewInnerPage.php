<?php

namespace App\Livewire\Frontend\Innerpage;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class ViewInnerPage extends Component
{

// Declare a public property to store the $id parameter

public $news_id ,$category_en, $category_hin ,$category_pbi  ,$category_urdu;
public $language_Val , $menuId ,$slug;

public function mount(NewsPost $newsid)
{

    if ($newsid) {
        $this->news_id = $newsid->id;
        $this->menuId =  $newsid->getmenu->id;



      
    } else {
        abort(404);

    }
}

    public function render()
    {
      
        $getNewsDetail = NewsPost::with('getmenu', 'newstype')->where('id' ,  $this->news_id  )
        ->where('status', 'Approved') ->whereNull('deleted_at')->first();    
    
        return view('livewire.frontend.innerpage.view-inner-page' ,
        [ 
            //  'recmendNewsData' =>$recmendNewsData , 
        
        'getNewsDetail' => $getNewsDetail
         ])->layout('layouts.app');
    }
}
