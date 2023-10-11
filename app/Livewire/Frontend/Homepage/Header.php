<?php

namespace App\Livewire\Frontend\Homepage;

use App\Models\Category;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $getMenus  =  Category::orderby('sort_id','ASC')->where('status' ,'Active')->where('deleted_at',Null)->get();

        return view('livewire.frontend.homepage.header' ,['getMenus' => $getMenus]);
    }

}
