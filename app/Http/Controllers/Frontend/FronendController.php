<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use Illuminate\Http\Request;

class FronendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $data['getMenus']  =  Category::orderby('sort_id','ASC')->where('status' ,'Active')->where('deleted_at',Null)->get();
       
        $data['flashNewsData'] = NewsPost::with('getmenu', 'newstype', 'user') 
                                        ->where('status', 'Approved') ->whereNull('deleted_at')
                                        ->where(function ($query) { $query->whereIn('breaking_side', ['Show'])
                                                 ->orWhereIn('breaking_top', ['Show'])
                                                 ->orWhereIn('slider', ['Show']);
                                        })
                                        ->orderBy('created_at', 'desc')->get(); 

        $data['latestNewsData'] = NewsPost::with('getmenu', 'newstype', 'user') 
                                            ->where('status', 'Approved') ->whereNull('deleted_at')
                                            ->where(function ($query) { $query->whereIn('breaking_side', ['Show']);})
                                            ->orderBy('created_at', 'desc')->get();        
        $data['topNewsData'] = NewsPost::with('getmenu', 'newstype', 'user') 
                                        ->where('status', 'Approved') ->whereNull('deleted_at')
                                        ->where(function ($query) { $query->whereIn('breaking_top', ['Show']);})
                                        ->orderBy('created_at', 'desc')->get();                                    
        // ->orWhereIn('other_column_name', ['value1', 'value2']); // Add more columns as needed
        $data['centerNewsCat'] = NewsPost::with('getmenu', 'newstype', 'user') 
                                         ->where('status', 'Approved')->whereNull('deleted_at')
                                         ->orderBy('created_at', 'desc')->get();                                   
        return view('frontend.welcome' ,$data);

    }

     public function category_page(){
        $data['getMenus']  =  Category::orderby('sort_id')->where('status' ,'Active')->where('deleted_at',Null)->get();

        return view('frontend.category',$data);
     }

     public function inner_page(){
        $data['getMenus']  =  Category::orderby('sort_id')->where('status' ,'Active')->where('deleted_at',Null)->get();

        return view('frontend.inner'  ,$data);

     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
