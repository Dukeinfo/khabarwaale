<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FronendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $data['getMenus']  =  Category::orderby('sort_id')->where('status' ,'Active')->where('deleted_at',Null)->get();
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
