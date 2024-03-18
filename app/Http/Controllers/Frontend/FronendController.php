<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\ArchiveNews;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Spatie\Browsershot\Browsershot;

class FronendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $languageVal;

    public function __construct()
    {

        $this->languageVal = Session::get('language');
    }



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


    public function category_page()
    {
        $data['getMenus']  =  Category::orderby('sort_id')->where('status', 'Active')->where('deleted_at', Null)->get();

        return view('frontend.category', $data);
    }


    public function inner_page()
    {

        return view('frontend.inner', compact('newsid'));
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

    public function archive_page()
    {
        // dd($getArchiveDate->archived_at);
        // ->whereBetween('created_at', [$startDate, $archiveDate]) 
        // $startDate = now()->startOfMonth();
        
        $getArchiveDate =        ArchiveNews::where('status' ,'Active')->first();
        $today = now()->toDateString();
        $archiveDate = $getArchiveDate ? $getArchiveDate->archived_at : now()->toDateString();
        $latestHinNewsData = NewsPost::with('getmenu', 'newstype')
            ->where('status', 'Approved')
            ->whereNull('deleted_at')
            ->whereIn('breaking_side', ['Show'])
            ->whereDate('created_at', '<=', $archiveDate) // Filter news based on the archive date or today's date
            ->latest()
            ->where('news_type', $this->getNewsType())
            ->take(6); 
        $data['latestHinNewsData'] = $latestHinNewsData->paginate(8);

        $data['latestLeftAds'] = Advertisment::where(function ($query) use ($archiveDate) {
                $query->where(function ($query) use ($archiveDate) {
                    // Check if today's date is within the advertisement date range
                    $query->where('from_date', '<=', $archiveDate)
                        ->where('to_date', '>=', $archiveDate);
                })->orWhere(function ($query) use ($archiveDate) {
                    // Check if today's date is equal to the from_date of the advertisement
                    $query->where('from_date', '=', $archiveDate);
                });
            })
            ->where('location', 'Left Add')
            ->where('page_name', 'Homepage')
            ->where('status', 'Yes')
            ->whereDate('created_at', '<=', $archiveDate) 
            ->first();
    
        $top_NewsData = NewsPost::with('getmenu', 'newstype')
            ->where('status', 'Approved')
            ->whereNull('deleted_at')
            ->whereIn('breaking_top', ['Show'])
            ->whereDate('created_at', '<=', $archiveDate) 
            ->latest()
            ->where('news_type', $this->getNewsType());
        $data['top_NewsData'] = $top_NewsData->limit(7)->paginate(6);
    
        $data['topNewsCentertAds'] =  Advertisment::where(function ($query) use ($archiveDate) {
            $query->where(function ($query) use ($archiveDate) {
                // Check if today's date is within the advertisement date range
                $query->where('from_date', '<=', $archiveDate)
                    ->where('to_date', '>=', $archiveDate);
            })->orWhere(function ($query) use ($archiveDate) {
                // Check if today's date is equal to the from_date of the advertisement
                $query->where('from_date', '=', $archiveDate);
            });
        })
            // ->where('to_date', '>=', $today)
            ->where('location', 'Under Top News')
            ->where('page_name', 'Homepage')
            ->where('status', 'Yes')
            ->whereDate('created_at', '<=', $archiveDate) 
            ->first();
    
        $data['rightAdvertisements'] =  Advertisment::where(function ($query) use ($archiveDate) {
                $query->where(function ($query) use ($archiveDate) {
                        $query->where('from_date', '<=', $archiveDate)
                            ->where('to_date', '>=', $archiveDate);
                    })->orWhere(function ($query) use ($archiveDate) {
                        $query->where('from_date', '=', $archiveDate);
                    });
                })
                ->whereDate('created_at', '<=', $archiveDate) 
                 ->where('location', 'Right Add')
                ->where('page_name', 'Homepage')
                ->where('status', 'Yes')
                ->latest()
            ->limit(3)
            ->get();
    
        $data['homeCenterLongAdd'] =  Advertisment::where(function ($query) use ($archiveDate) {
            $query->where(function ($query) use ($archiveDate) {
                // Check if today's date is within the advertisement date range
                $query->where('from_date', '<=', $archiveDate)
                    ->where('to_date', '>=', $archiveDate);
            })->orWhere(function ($query) use ($archiveDate) {
                // Check if today's date is equal to the from_date of the advertisement
                $query->where('from_date', '=', $archiveDate);
            });
        })
            // ->where('to_date', '>=', $today)
            ->where('location', 'Center Banner')
            ->where('page_name', 'Homepage')
            ->where('status', 'Yes')
            ->whereDate('created_at', '<=', $archiveDate) 
            ->latest()
            ->first();
    
        $data['getFirstCatName'] = Category::orderBy('sort_id', 'ASC')
            ->where('status', 'Active')
            ->where('sort_id', 2)
            ->whereNull('deleted_at')
            ->first();
    
        if ($data['getFirstCatName']) {
            $firstcategoryIds = explode(',', $data['getFirstCatName']->id);
            $ca1t_Wise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
                ->whereIn('category_id', $firstcategoryIds)
                ->where('news_type', $this->getNewsType())
                ->whereDate('created_at', '<=', $archiveDate) 
                ->latest();
            $data['ca1t_Wise_News'] = $ca1t_Wise_News->limit(4)->get();
        } else {
            $data['ca1t_Wise_News'] = collect();
        }
    
        $data['getSecondCatName'] = Category::orderBy('sort_id', 'ASC')
            ->where('status', 'Active')
            ->where('sort_id', 3)
            ->whereNull('deleted_at')
            ->first();
    
        if ($data['getSecondCatName']) {
            $secthirdcategoryIds = explode(',', $data['getSecondCatName']->id);
            $second_Ca_tWise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
                ->whereIn('category_id', $secthirdcategoryIds)
                ->where('news_type', $this->getNewsType())
                ->whereDate('created_at', '<=', $archiveDate) 
                ->latest();
            $data['second_Ca_tWise_News'] = $second_Ca_tWise_News->limit(4)->get();
        }
    
        $data['getThirdCatName'] = Category::orderBy('sort_id', 'ASC')
            ->where('status', 'Active')
            ->where('sort_id', 4)
            ->whereNull('deleted_at')
            ->first();
    
        if ($data['getThirdCatName']) {
            $thirdCategoryIds = explode(',', $data['getThirdCatName']->id);
            $third_Cat_Wise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
                ->whereIn('category_id', $thirdCategoryIds)
                ->where('news_type', $this->getNewsType())
                ->whereDate('created_at', '<=', $archiveDate) 
                ->latest();
            $data['third_Cat_Wise_News'] = $third_Cat_Wise_News->limit(4)->get();
        }
    
        $data['getFourthCatName'] = Category::orderBy('sort_id', 'ASC')
            ->where('status', 'Active')
            ->where('sort_id', 5)
            ->whereNull('deleted_at')
            ->first();
    
        $fourthSideCategoryIds = explode(',', $data['getFourthCatName']->id);
        $fourthCatWise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
            ->whereIn('category_id', $fourthSideCategoryIds)
            ->where('news_type', $this->getNewsType())
            ->whereDate('created_at', '<=', $archiveDate) 
            ->latest();
    
        $data['fourthCatWise_News'] = $fourthCatWise_News->limit(4)->get();
    
        $data['homeBottomAdd'] = Advertisment::where('from_date', '<=', $today)
            // ->where('to_date', '>=', $today)
            ->where('location', 'Bottom Banner')
            ->where('page_name', 'Homepage')
            ->where('status', 'Yes')
            ->whereDate('created_at', '<=', $archiveDate) 
            ->latest()
            ->first();
    
        $data['get_bottom1_Menus'] = Category::orderBy('sort_id', 'ASC')
            ->where('status', 'Active')
            ->where('sort_id', 6)
            ->whereNull('deleted_at')
            ->first();
    
        if ($data['get_bottom1_Menus']) {
            $fifthcategoryIds = explode(',', $data['get_bottom1_Menus']->id);
            $five_CatWise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
                ->whereIn('category_id', $fifthcategoryIds)
                ->where('news_type', $this->getNewsType())
                ->whereDate('created_at', '<=', $archiveDate) 
                ->latest();
    
            $data['five_CatWise_News'] = $five_CatWise_News->limit(4)->get();
        }
    
        $data['get_bottom2_Menus'] = Category::orderBy('sort_id', 'ASC')
            ->where('status', 'Active')
            ->where('sort_id', 7)
            ->whereNull('deleted_at')
            ->first();
    
        $fivecategoryIds = explode(',', $data['get_bottom2_Menus']->id);
        $six_CatWise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
            ->whereIn('category_id', $fivecategoryIds)
            ->where('news_type', $this->getNewsType())
            ->whereDate('created_at', '<=', $archiveDate) 
            ->latest();
    
        $data['six_CatWise_News'] = $six_CatWise_News->limit(4)->get();
    
        $data['get_bottom3_Menus'] = Category::orderBy('sort_id', 'ASC')
            ->where('status', 'Active')
            ->where('sort_id', 8)
            ->whereNull('deleted_at')
            ->first();
    
        $sevencategoryIds = explode(',', $data['get_bottom3_Menus']->id);
        $seven_CatWise_News = NewsPost::with(['newstype', 'user', 'getmenu'])
            ->whereIn('category_id', $sevencategoryIds)
            ->where('news_type', $this->getNewsType())
            ->whereDate('created_at', '<=', $archiveDate) 
            ->latest();
    
        $data['seven_CatWise_News'] = $seven_CatWise_News->limit(4)->get();
    
        return view('archive_news_page', $data);
    }
    

    private function getNewsType()
    {
        switch ($this->languageVal) {
            case 'hindi':
                return 1;

            case 'english':
                return 2;

            case 'punjabi':
                return 3;

            case 'urdu':
                return 4;

            default:
                return 1; // Handle the default case if needed
        }
    }

    public function reporterNews()
    {
        $today = now()->toDateString();
        $editorRightAdd = Advertisment::where('from_date', '<=', $today)
            // ->where('to_date', '>=', $today)
            ->where('location', 'Right Add')
            ->where('page_name', 'Reporter_news')
            ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
            ->orderBy('created_at', 'desc')
            ->get();
        return view('reporter_news', compact('editorRightAdd'));
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




    public function verify($token, $email)
    {
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
