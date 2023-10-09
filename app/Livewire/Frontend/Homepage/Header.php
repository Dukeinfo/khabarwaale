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
    public function english(){
        // session()->get('language');
        // session()->forget('language');
        // session()->forget('locale');

        
        // Session::put('language','english');
        // App::setLocale('en');
        session()->put('locale', 'en');
        $this->js('window.location.reload()'); 

    }
    public function Hindi(){
        // session()->get('language');
        // session()->forget('language');
        // session()->forget('locale');

        // Session::put('language','hindi');
        // App::setLocale('hi');
        session()->put('locale', 'hi');
        $this->js('window.location.reload()'); 

    }
 
  public function punjabi(){
        // session()->get('language');
        // session()->forget('language');
        // session()->forget('locale');

        // Session::put('language','punjabi');
        // App::setLocale('pa');
        session()->put('locale', 'pa');

        $this->js('window.location.reload()'); 

    }


    public function urdu(){
        // session()->get('language');
        // session()->forget('language');
        // session()->forget('locale');

        // Session::put('language','urdu');

        // App::setLocale('ur');
        session()->put('locale', 'ur');
        $this->js('window.location.reload()'); 


    }

    // public function change(Request $request){
    //     App::setLocale($request->lang);
    //     session()->forget('locale');
    //     session()->put('locale', $request->lang);
  
    //     return redirect()->back();
    // }
}
