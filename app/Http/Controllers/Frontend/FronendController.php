<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subscription;
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
       
   
        $data['latestNewsData'] = NewsPost::with('getmenu', 'newstype', 'user') 
                                            ->where('status', 'Approved') ->whereNull('deleted_at')
                                            ->where(function ($query) { $query->whereIn('breaking_side', ['Show']);})
                                            ->orderBy('created_at', 'desc')
                                            ->limit(6)
                                            ->get();        
        $data['topNewsData'] = NewsPost::with('getmenu', 'newstype', 'user') 
                                        ->where('status', 'Approved') ->whereNull('deleted_at')
                                        ->where(function ($query) { $query->whereIn('breaking_top', ['Show']);})
                                        ->orderBy('created_at', 'desc')
                                        ->limit(8)
                                        ->get();                                    
        // ->orWhereIn('other_column_name', ['value1', 'value2']); // Add more columns as needed
        $data['centerNewsCat'] = NewsPost::with('getmenu', 'newstype', 'user') 
                                         ->where('status', 'Approved')->whereNull('deleted_at')
                                         ->orderBy('created_at', 'desc')
                                         ->limit(10)
                                         ->get();                                   
        return view('frontend.welcome' ,$data);

    }

     public function category_page(){
        $data['getMenus']  =  Category::orderby('sort_id')->where('status' ,'Active')->where('deleted_at',Null)->get();

        return view('frontend.category',$data);
     }

     public function inner_page(){

        return view('frontend.inner',compact('newsid'));

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


    public function verify($token, $email) {
    $subscriber_data = Subscription::where('token', $token)->where('email', $email)->first();
    if ($subscriber_data) {
        if ($subscriber_data->status === 'Active') {
            return redirect()->back()->with('warning', 'Your email is already verified.');
        }
        $subscriber_data->token = '';
        $subscriber_data->status = 'Active';
        $subscriber_data->update();

        return redirect()->back()->with('success', 'You are successfully verified as a subscriber to this system.');
    } else {
        return redirect()->route('home.homepage');
    }
}

}
