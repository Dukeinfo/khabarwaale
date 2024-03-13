<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Browsershot\Browsershot;
class FronendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {                           
        return view('welcome');

    }

    public function category($id, $slug)
    {
        return view('category', compact('id', 'slug'));
    }

    public function inner($newsid, $slug)
    {
        return view('inner', compact('newsid', 'slug'));
    }


     public function category_page(){
        $data['getMenus']  =  Category::orderby('sort_id')->where('status' ,'Active')->where('deleted_at',Null)->get();

        return view('frontend.category',$data);
     }

     
     public function inner_page(){

        return view('frontend.inner',compact('newsid'));

     }


     public function videoGallery()
     {
         return view('video-gallery');
     }

     public function archive($id, $slug)
     {
         return view('archive', compact('id', 'slug'));
     }

     public function readMore()
     {
         return view('readmorefooter');
     }


     public function privacyPolicy()
     {
         return view('privacy_policy');
     }

     public function reporterNews()
     {
        $today = now()->toDateString();
        $editorRightAdd = Advertisment::where('from_date', '<=', $today)
                           ->where('to_date', '>=', $today)
                           ->where('location','Right Add')
                           ->where('page_name' ,'Reporter_news')
                           ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                           ->orderBy('created_at', 'desc')
                           ->get();
         return view('reporter_news',compact('editorRightAdd'));
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
                return redirect()->route('home.homepage')->with('info', 'Your email is already verified.');
            }
            $subscriber_data->token = '';
            $subscriber_data->status = 'Active';
            $subscriber_data->update();
    
            return redirect()->route('home.homepage')->with('success', 'You are successfully verified as a subscriber with us');
        } else {
            return redirect()->route('home.homepage')->with('error', 'Invalid verification link. Please make sure the link is correct or try resubscribing.');
        }
    }
    



}
