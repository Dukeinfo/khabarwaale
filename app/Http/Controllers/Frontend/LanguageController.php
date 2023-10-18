<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //

    
    public function english(){
        session()->get('language');
        session()->forget('language');
        // session()->forget('locale');

        
        Session::put('language','english');
        // App::setLocale('en');
        // session()->put('locale', 'en');
        return redirect()->back();
    }
    public function Hindi(){
        session()->get('language');
        session()->forget('language');
        // session()->forget('locale');

        Session::put('language','hindi');
        // App::setLocale('hi');
        // session()->put('locale', 'hi');
        return redirect()->back();
    }
 
  public function punjabi(){
        session()->get('language');
        session()->forget('language');
        // session()->forget('locale');

        Session::put('language','punjabi');
        // App::setLocale('pa');
        // session()->put('locale', 'pa');
        return redirect()->back();
    }


    public function urdu(){
        session()->get('language');
        session()->forget('language');
        // session()->forget('locale');

        Session::put('language','urdu');

        // App::setLocale('ur');
        // session()->put('locale', 'ur');
        return redirect()->back();
    }
    public function clear_all_Lang(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');       
        return redirect()->back();
    }
    // public function change(Request $request){
    //     App::setLocale($request->lang);
    //     session()->forget('locale');
    //     session()->put('locale', $request->lang);
  
    //     return redirect()->back();
    // }
}
