@extends('layouts.master')
@php
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOTools;

$seoMetaData =  App\Models\SeoMetadetail::first();
        if($seoMetaData){
    // if($seoMetaData){    
    SEOTools::setTitle($seoMetaData->title ?? 'Archive - Punjabi News Portal ');
    SEOTools::setDescription($seoMetaData->description ?? 'Archive - Punjabi News Portal');
    SEOTools::opengraph()->setUrl(url()->current());
    SEOTools::setCanonical(url()->current());
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::twitter()->setSite($seoMetaData->title ?? 'Archive - Punjabi News Portal');
    $keywords = $seoMetaData->keywords ?? 'Archive - Punjabi News Portal';
    SEOMeta::addKeyword( $keywords);
       
    }
@endphp
@section('content')

{{-- <section class="p-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2">Advertisement</p>
                <a href="javascript:void()">
                    <img src="{{asset('assets')}}/images/ads/h-ad1.png" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</section> --}}
<section class="p-t-30">
    <div class="container">
        <div class="row">
            {{-- ਤਾਜ਼ਾ ਖ਼ਬਰਾਂ  start--}}
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                @switch(session()->get('language'))
                                @case('hindi')
                                    {!! 'ताजा खबर' !!}
                                    @break
                                @case('english')
                                    {!! 'Latest News'!!}
                                @break
                                @case('punjabi')
                                    {!! 'ਤਾਜ਼ਾ ਖ਼ਬਰਾਂ'!!}
                                    @break
                                @case('urdu')
                                    {!!' تازہ ترین خبریں '!!}
                                    @break
                                @default
                                     {!! 'Latest News'!!}
                                @endswitch
                            </h3>
                        </div>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                @forelse ($latestHinNewsData as $news )
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <h5 class="p-b-5">
                                            {{-- <a target="_blank" href="{{route('home.inner',['newsid' => $news->id , 'slug' =>  $news->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03"> --}}
                                                @if (strpos($news->category_id, ',') === false)
                                                {{-- Single category ID --}}
                                                    <a  target="_blank"  href="{{ route('home.category', ['id' => $news->getmenu->id, 'slug' => createSlug($news->getmenu['category_en'])]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        <span class="text-danger mr-1">
                                                            
                                                        @if (session()->get('language') === 'hindi')
                                                            {{$news['getmenu']['category_hin'] ?? "NA"}}
                                                        @elseif (session()->get('language') === 'english')
                                                            {{$news['getmenu']['category_en'] ?? "NA"}}
                                                        @elseif (session()->get('language') === 'punjabi')
                                                            {{$news['getmenu']['category_pbi'] ?? "NA"}}
                                                        @elseif (session()->get('language') === 'urdu')
                                                            {{$news['getmenu']['category_urdu'] ?? "NA"}}
                                                        @else   
                                                            {{$news['getmenu']['category_en'] ?? "NA"}}
                                                        @endif
                                                        </span>
                                                    </a>
                                                @else
                                                {{-- Multiple category IDs --}}
                                                @php
                                                        $categoryIdsArray = explode(',', $news->category_id);
                                                        $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->get();
                                                @endphp
                                                @foreach ($categories as $key => $category)
                                                @if ($loop->index < 2)
                                                    <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        <span class="text-danger mr-1">
                                                        @if (session()->get('language') === 'hindi')
                                                            {{ $category->category_hin ?? "NA" }}
                                                        @elseif (session()->get('language') === 'english')
                                                            {{ $category->category_en ?? "NA" }}
                                                        @elseif (session()->get('language') === 'punjabi')
                                                            {{ $category->category_pbi ?? "NA" }},
                                                        @elseif (session()->get('language') === 'urdu')
                                                            {{$category->category_urdu ?? "NA" }}
                                                        @else   
                                                            {{ $category->category_en ?? "NA" }}
                                                        @endif
                                                        </span>
                                                    </a>
                                                @endif
                                                @endforeach
                                                @endif
                                                <a  target="_blank"  href="{{route('home.inner',['newsid' => $news->id , 'slug' =>  $news->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">

                                                     {!! Str::limit($news->title, 60) !!} 
                                                </a>
                                                      
                                                        
                                            {{-- </a> --}}
                                        </h5>
                                        <span class="cl8">
                                            <span class="f1-s-3">
                                            {{carbon\Carbon::parse($news->post_date)->format('M d, Y')}}
                                            </span>
                                        </span>
                                    </div>
                                </div> 
                                @empty
                                <p class="text-danger"> 
                                    @if (session()->get('language') == "hindi" )
                                    {!!  'कोई खबर नहीं मिली' !!}
                                    @endif
                                     @if (session()->get('language') == "english" )
                                     {!! 'No news found' !!}
                                    @endif
                                     @if (session()->get('language') == "punjabi" )
                                     {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ'!!}
                                    @endif
                                     @if (session()->get('language') == "urdu" )
                                     {!! 'کوئی خبر نہیں ملی'!!}
                                    @endif
                                </p>
                                @endforelse
                              
                         
                                <div class="text-center">
                                    <a href="javascript:void()" class="btn btn-primary px-5">
                                        @if (session()->get('language') === 'hindi')
                                                सभी को देखें
                                        @elseif (session()->get('language') === 'english')
                                                View All
                                        @elseif (session()->get('language') === 'punjabi')
                                                ਸਭ ਦੇਖੋ
                                        @elseif (session()->get('language') === 'urdu')
                                                سب دیکھیں     
                                        @else   
                                                View All
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                   {{-- below ਤਾਜ਼ਾ ਖ਼ਬਰਾਂ add section  --}}
                    @if(isset($latestLeftAds))
                    <div class="col-lg-12 mb-4">
                        <div class="card bg-white shadow-sm text-center border-0">
                            <div class="card-body">
                                <a href="javascript:void()"   >
                                    <img src="{{getAddImage($latestLeftAds->image) }}"  class="img-fluid" alt="" loading="lazy">
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                    @endif
                </div>
            </div>

            {{-- ਤਾਜ਼ਾ ਖ਼ਬਰਾਂ end  --}}

            <!-- main news -->
            {{-- 'ਪ੍ਰਮੁੱਖ ਖਬਰਾਂ' start --}}
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                  
                                @switch(session()->get('language'))
                                @case('hindi')
                                    {!!  'मुख्य समाचार' !!}
                                    @break
                                @case('english')
                                    {!! 'Top News'  !!}
                                    @break
                                @case('punjabi')
                                    {!! 'ਪ੍ਰਮੁੱਖ ਖਬਰਾਂ'  !!}
                                    @break
                                @case('urdu')
                                    {!! 'اہم خبریں۔' !!}
                                    @break
                                @default
                                    {!! 'Top News'  !!}
                                @endswitch  
                            </h3>
                        </div>
                        @forelse ($top_NewsData as  $key => $hintopNews )
                                @if($key === 0)
                             
                                        <div class="card border-0 shadow-sm mb-3">
                                            <div class="card-body">
                                                <div class="p-b-20">
                                                    <h5 class="p-b-5">
                                                        <a target="_blank" href="{{route('home.inner',['newsid' => $hintopNews->id , 'slug' =>  $hintopNews->slug  ])}}" class="f1-m-3 cl2 hov-cl10 trans-03 font-weight-bold">
                                                       
                                                                {!! Str::limit($hintopNews->title, 70) !!} 
                                                        </a>
                                                    </h5>
                                                    <span class="cl8">
                                       
                                                        @if (strpos($hintopNews->category_id, ',') === false)
                                                        {{-- Single category ID --}}
                                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $hintopNews->getmenu->id, 'slug' => createSlug($hintopNews->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                                @if (session()->get('language') === 'hindi')
                                                                    {{$hintopNews['getmenu']['category_hin'] ?? "NA"}}
                                                                @elseif (session()->get('language') === 'english')
                                                                    {{$hintopNews['getmenu']['category_en'] ?? "NA"}}
                                                                @elseif (session()->get('language') === 'punjabi')
                                                                    {{$hintopNews['getmenu']['category_pbi'] ?? "NA"}}
                                                                @elseif (session()->get('language') === 'urdu')
                                                                    {{$hintopNews['getmenu']['category_urdu'] ?? "NA"}}
                                                                @else   
                                                                    {{$hintopNews['getmenu']['category_en'] ?? "NA"}}
                                                                @endif
                                                            </a>
                                                        @else
                                                        {{-- Multiple category IDs --}}
                                                        @php
                                                                $categoryIdsArray = explode(',', $hintopNews->category_id);
                                                                $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->get();
                                                        @endphp
                                                        @foreach ($categories as $key => $category)
                                                        @if ($loop->index < 3)
                                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                                @if (session()->get('language') === 'hindi')
                                                                    {{ $category->category_hin ?? "NA" }}
                                                                @elseif (session()->get('language') === 'english')
                                                                    {{ $category->category_en ?? "NA" }}
                                                                @elseif (session()->get('language') === 'punjabi')
                                                                    {{ $category->category_pbi ?? "NA" }},
                                                                @elseif (session()->get('language') === 'urdu')
                                                                    {{$category->category_urdu ?? "NA" }}
                                                                @else   
                                                                    {{ $category->category_en ?? "NA" }}
                                                                @endif
                                                            </a>
                                                        @endif
                                                        @endforeach
                                                        @endif
            
                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>
                                                        <span class="f1-s-3">
                                                            {{carbon\Carbon::parse($hintopNews->post_date)->format('M d, Y')}}
            
                                                        </span>
                                                    </span>
                                                </div>
                                                <a target="_blank" href="{{route('home.inner',['newsid' => $hintopNews->id , 'slug' =>  $hintopNews->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                                    <img src="{{  isset($hintopNews->image)?getNewsImage($hintopNews->image) : asset('assets/images/news/n1.jpg')}}" alt="IMG" class="img-fluid rounded" loading="lazy">
                                                </a>
                                            </div>
                                        </div>
                                  
                                @else   
                                  
            
                                        <div class="card border-0 shadow-sm mb-3">
                                            <div class="card-body">
                                                <div class="flex-wr-sb-s">
                                                    <div class="size-w-2">
                                                        <h5 class="p-b-5">
                                                            <a target="_blank" href="{{route('home.inner',['newsid' => $hintopNews->id , 'slug' =>  $hintopNews->slug  ])}}" target="_blank" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                             
                                                                {!! Str::limit($hintopNews->title, 65) !!} 
                                                            </a>
                                                        </h5>
                                                        <span class="cl8">
                                                            @if (strpos($hintopNews->category_id, ',') === false)
                                                            {{-- Single category ID --}}
                                                                <a  target="_blank"  href="{{ route('home.category', ['id' => $hintopNews->getmenu->id, 'slug' => createSlug($hintopNews->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                                    @if (session()->get('language') === 'hindi')
                                                                        {{$hintopNews['getmenu']['category_hin'] ?? "NA"}}
                                                                    @elseif (session()->get('language') === 'english')
                                                                        {{$hintopNews['getmenu']['category_en'] ?? "NA"}}
                                                                    @elseif (session()->get('language') === 'punjabi')
                                                                        {{$hintopNews['getmenu']['category_pbi'] ?? "NA"}}
                                                                    @elseif (session()->get('language') === 'urdu')
                                                                        {{$hintopNews['getmenu']['category_urdu'] ?? "NA"}}
                                                                    @else   
                                                                        {{$hintopNews['getmenu']['category_en'] ?? "NA"}}
                                                                    @endif
                                                                </a>
                                                            @else
                                                            {{-- Multiple category IDs --}}
                                                            @php
                                                                    $categoryIdsArray = explode(',', $hintopNews->category_id);
                                                                    $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->get();
                                                            @endphp
                                                            @foreach ($categories as $category)
                                                            @if ($loop->index < 3)
                                                                <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                                    @if (session()->get('language') === 'hindi')
                                                                        {{ $category->category_hin ?? "NA" }}
                                                                    @elseif (session()->get('language') === 'english')
                                                                        {{ $category->category_en ?? "NA" }}
                                                                    @elseif (session()->get('language') === 'punjabi')
                                                                        {{ $category->category_pbi ?? "NA" }},
                                                                    @elseif (session()->get('language') === 'urdu')
                                                                        {{$category->category_urdu ?? "NA" }}
                                                                    @else   
                                                                        {{ $category->category_en ?? "NA" }}
                                                                    @endif
                                                                </a>
                                                                @endif
                                                            @endforeach
                                                            @endif
                                                            <span class="f1-s-3 m-rl-3">
                                                                -
                                                            </span>
                                                            <span class="f1-s-3">
                                                                {{carbon\Carbon::parse($hintopNews->post_date)->format('M d, Y')}}
                                                            </span>
                                                        </span>
                                                    </div>
                                                    
                                                    <a target="_blank" href="{{route('home.inner',['newsid' => $hintopNews->id , 'slug' =>  $hintopNews->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                        <img src="{{  isset($hintopNews->thumbnail)? getThumbnail($hintopNews->thumbnail)  :  getNewsImage($hintopNews->image)}}" alt="" class="img-fluid rounded" loading="lazy">
                                                    </a>  
                                                </div>
                                            </div>
                                        </div>
                                   
                                @endif
                        @empty 
                                @switch(session()->get('language'))
                                @case('hindi')
                                        <p class="text-center text-danger"> {!! "कोई खबर नहीं मिली" !!}     </p>
                                    @break
                                @case('punjabi')
                                        <p class="text-center text-danger">   {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ' !!}</p>
                                    @break
                                @case('urdu')
                                    <p class="text-center text-danger">   {!! 'کوئی خبر نہیں ملی' !!}</p>
                                    @break
                                @case('english')
                                    <p class="text-center text-danger">   {{" No news found"}}</p>
                                @break
                                @default
                                    <p class="text-center text-danger">   {{" No news found"}}</p>
                                @endswitch
                        @endforelse
            
            
                     
            
                  
                        
            
                        <div class="text-center">
            
                            @if(isset($topNewsCentertAds))
                            
                            <a href="{{$topNewsCentertAds->link_add  ?? '#'}}">
                                <img src="{{ getAddImage($topNewsCentertAds->image) }}" class="img-fluid" alt="">
                            </a>
                            @else
                       
                            @endif
                        </div>
                    </div>
                </div>
         
            </div>
            {{-- 'ਪ੍ਰਮੁੱਖ ਖਬਰਾਂ' end --}}

            {{-- right side add section  --}}
            <div class="col-lg-4">
                <div class="row">
                    @forelse ($rightAdvertisements as $advertisement)
                    <div class="col-lg-12 mb-4" >
                        <div class="card bg-white shadow-sm text-center border-0">
                            <div class="card-body">
               
                                @if(isset($advertisement->image))
                                    <a href="{{$advertisement->link_add ?? "#"}}">
                                        <img src="{{  getAddImage($advertisement->image) }}" class="img-fluid" alt="" loading="lazy" >
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
            
                    @endforelse

              
               
                    <!-- Editor's Desk -->
                    @livewire('frontend.advertisement.editor-profile')
                    <!-- Subscribe -->
                    @livewire('frontend.homepage.subscribe.subscribe-form')
                </div>
            </div>
            {{-- right side add section  --}}

        </div>
    </div>
</section>
 {{-- center add of home page  --}}
 <section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                @if(isset($homeCenterLongAdd))
                <a href="{{$homeCenterLongAdd->link_add ?? '#'}}">
                    <img src="{{ getAddImage($homeCenterLongAdd->image)  }}" class="img-fluid" alt="" loading="lazy">
                </a>
                @else
    
                @endif
            </div>
        </div>
    </div>
</section>
 {{-- center add of home page  --}}
{{-- punjba news section  --}}
<section class="p-t-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="p-b-20">
                    {{-- punjba news section  --}}
                    <div class="p-b-20">
                        <div class="how2 how2-cl5 mb-4 flex-sb-c bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                @if (session()->get('language') === 'hindi')
                                            {{ $getFirstCatName->category_hin  ?? "NA"}}
                                @elseif (session()->get('language') === 'english')
                                            {{ $getFirstCatName->category_en  ?? "NA"}}
                                @elseif (session()->get('language') === 'punjabi')
                                            {{ $getFirstCatName->category_pbi ?? "NA"}}
                                @elseif (session()->get('language') === 'urdu')
                                        {{ $getFirstCatName->category_urdu ?? "NA"}}
                                @else   
                                        {{ $getFirstCatName->category_en  ?? "NA"}}
                                @endif
                            </h3>
                            @if(isset($getFirstCatName))
                            <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                @if (session()->get('language') === 'hindi')
                                      सभी को देखें
                                @elseif (session()->get('language') === 'english')
                                        View All
                                @elseif (session()->get('language') === 'punjabi')
                                        ਸਭ ਦੇਖੋ
                                @elseif (session()->get('language') === 'urdu')
                                        سب دیکھیں     
                                @else   
                                        View All
                                @endif
                                <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                            </a>
                            @endif
                        </div>
                        <div class="row" >
                            @forelse ($ca1t_Wise_News as $index => $cat1_wise )
                                     @if( $index == 0 )
                                        <div class="col-sm-6" >
                                            <!-- Item post -->
                                            <div class="m-b-30">
                                                <div class="card border-0 shadow-sm mb-3">
                                                    <div class="card-body">
                                                        <a   target="_blank"  href="{{route('home.inner',['newsid' => $cat1_wise->id , 'slug' =>  $cat1_wise->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                                            <img src="{{ isset($cat1_wise->image)? getNewsImage($cat1_wise->image)  : asset('assets/images/post-05.jpg')}}" alt="IMG" class="img-fluid rounded" loading="lazy">
                                                        </a>
                                                        <div class="p-t-20">
                                                            <h5 class="p-b-5">
                                                                <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat1_wise->id , 'slug' =>  $cat1_wise->slug ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                                                    {!!  Str::limit($cat1_wise->title, 85) ?? "NA" !!}
                                                                </a>
                                                            </h5>
                                                            <span class="cl8">
                                                                @if (strpos($cat1_wise->category_id, ',') === false)
                                                                {{-- Single category ID --}}
                                                                <a  target="_blank"  href="{{ route('home.category', ['id' => $cat1_wise->getmenu->id, 'slug' => createSlug($cat1_wise->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                                    @if (session()->get('language') === 'hindi')
                                                                        {{$cat1_wise['getmenu']['category_hin'] ?? "NA"}}:
                                                                    @elseif (session()->get('language') === 'english')
                                                                        {{$cat1_wise['getmenu']['category_en'] ?? "NA"}}:
                                                                    @elseif (session()->get('language') === 'punjabi')
                                                                        {{$cat1_wise['getmenu']['category_pbi'] ?? "NA"}}:
                                                                    @elseif (session()->get('language') === 'urdu')
                                                                        {{$cat1_wise['getmenu']['category_urdu'] ?? "NA"}}:
                                                                    @else   
                                                                        {{$cat1_wise['getmenu']['category_en'] ?? "NA"}}:
                                                                    @endif
                                                                </a>
                                                            @else
                                                              {{-- Multiple category IDs --}}
                                                            @php
                                                                    $categoryIdsArray = explode(',', $cat1_wise->category_id);
                                                                    $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id' ,2)->get();
                                                            @endphp
                                                            @foreach ($categories as $category)
                                                               
                                                                    <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                                        @if (session()->get('language') === 'hindi')
                                                                            {{ $category->category_hin ?? "NA" }}:
                                                                        @elseif (session()->get('language') === 'english')
                                                                            {{ $category->category_en ?? "NA" }}:
                                                                        @elseif (session()->get('language') === 'punjabi')
                                                                            {{ $category->category_pbi ?? "NA" }}:
                                                                        @elseif (session()->get('language') === 'urdu')
                                                                            {{$category->category_urdu ?? "NA" }}:
                                                                        @else   
                                                                            {{ $category->category_en ?? "NA" }}:
                                                                        @endif
                                                                    </a>
                                                            @endforeach
                                                            @endif
                                                                <span class="f1-s-3 m-rl-3">
                                                                    -
                                                                </span>
                                                                <span class="f1-s-3">
                                                                    {!! carbon\Carbon::parse($cat1_wise->post_date)->format('M d, Y') ?? "NA" !!}
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     @else 
                                @endif
                            @empty
                            @endforelse
                            <div class="col-sm-6">
                                        @forelse ( $ca1t_Wise_News as $key =>  $cat1_wise)
                                                @if( $key > 0 )
                                                    <div class="card border-0 shadow-sm mb-3" >
                                                        <div class="card-body">
                                                            <div class="flex-wr-sb-s">
                                                                <div class="size-w-2">
                                                                    <h5 class="p-b-5">
                                                                        <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat1_wise->id , 'slug' =>  $cat1_wise->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                            {!! Str::limit($cat1_wise->title, 65) ?? "NA" !!}
                                                                        </a>
                                                                    </h5>
                                                                    <span class="cl8">
                                                                        @if (strpos($cat1_wise->category_id, ',') === false)
                                                                            {{-- Single category ID --}}
                                                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $cat1_wise->getmenu->id, 'slug' => createSlug($cat1_wise->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                                                @if (session()->get('language') === 'hindi')
                                                                                    {{$cat1_wise['getmenu']['category_hin'] ?? "NA"}}:
                                                                                @elseif (session()->get('language') === 'english')
                                                                                    {{$cat1_wise['getmenu']['category_en'] ?? "NA"}}:
                                                                                @elseif (session()->get('language') === 'punjabi')
                                                                                    {{$cat1_wise['getmenu']['category_pbi'] ?? "NA"}}:
                                                                                @elseif (session()->get('language') === 'urdu')
                                                                                    {{$cat1_wise['getmenu']['category_urdu'] ?? "NA"}}:
                                                                                @else   
                                                                                    {{$cat1_wise['getmenu']['category_en'] ?? "NA"}}:
                                                                                @endif
                                                                            </a>
                                                                        @else
                                                                        {{-- Multiple category IDs --}}
                                                                        @php
                                                                                $categoryIdsArray = explode(',', $cat1_wise->category_id);
                                                                                $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id' ,2)->get();
                                                                        @endphp
                                                                        @foreach ($categories as $category)
                                                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                                                @if (session()->get('language') === 'hindi')
                                                                                    {{ $category->category_hin ?? "NA" }}:
                                                                                @elseif (session()->get('language') === 'english')
                                                                                    {{ $category->category_en ?? "NA" }}:
                                                                                @elseif (session()->get('language') === 'punjabi')
                                                                                    {{ $category->category_pbi ?? "NA" }}:
                                                                                @elseif (session()->get('language') === 'urdu')
                                                                                    {{$category->category_urdu ?? "NA" }}:
                                                                                @else   
                                                                                    {{ $category->category_en ?? "NA" }}:
                                                                                @endif
                                                                            </a>
                                                                        @endforeach
                                                                        @endif
                                                                        <span class="f1-s-3 m-rl-3">
                                                                            -
                                                                        </span>
                                                                        <span class="f1-s-3">
                                                                            {!!  carbon\Carbon::parse($cat1_wise->post_date)->format('M d, Y') ?? "NA" !!}
                    
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <a   target="_blank"  href="{{route('home.inner',['newsid' => $cat1_wise->id , 'slug' =>  $cat1_wise->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                                    <img src="{{ isset($cat1_wise->thumbnail)? getThumbnail($cat1_wise->thumbnail)  :  getNewsImage($cat1_wise->image)   }}" alt="" class="img-fluid rounded" loading="lazy">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else 
                                                @endif
                                        @empty
                                    
                                            @switch(session()->get('language'))
                                            @case('hindi')
                                                    <p class="text-center text-danger"> {!! "कोई खबर नहीं मिली" !!}     </p>
                                                @break
                                            @case('punjabi')
                                                    <p class="text-center text-danger">   {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ' !!}</p>
                                                @break
                                            @case('urdu')
                                                <p class="text-center text-danger">   {!! 'کوئی خبر نہیں ملی' !!}</p>
                                                @break
                                            @case('english')
                                                <p class="text-center text-danger">   {{" No news found"}}</p>
                                            @break
                                            @default
                                                <p class="text-center text-danger">   {{" No news found"}}</p>
                                            @endswitch
                                    @endforelse
                            </div>
                        </div>
                    </div>
                    {{-- punjba news section  end --}}
                    <div class="row">
                        <!--  Chandigarh news section  -->
                        <div class="col-sm-6 p-b-25">
                            <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                                <h3 class="f1-m-2 cl17 tab01-title">
                                    @if (session()->get('language') === 'hindi')
                                                {{ $getSecondCatName->category_hin  ?? "NA"}}
                                    @elseif (session()->get('language') === 'english')
                                                {{ $getSecondCatName->category_en  ?? "NA"}}
                                    @elseif (session()->get('language') === 'punjabi')
                                                {{ $getSecondCatName->category_pbi ?? "NA"}}
                                    @elseif (session()->get('language') === 'urdu')
                                                {{ $getSecondCatName->category_urdu ?? "NA"}}
                                    @else   
                                                {{ $getSecondCatName->category_en  ?? "NA"}}
                                    @endif
                                </h3>
                                <a href="{{route('home.category', ['id' => $getSecondCatName->id, 'slug' => createSlug($getSecondCatName->category_en)  ])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">

                                    @if (session()->get('language') === 'hindi')
                                                 सभी को देखें
                                        @elseif (session()->get('language') === 'english')
                                                View All
                                        @elseif (session()->get('language') === 'punjabi')
                                                ਸਭ ਦੇਖੋ 
                                        @elseif (session()->get('language') === 'urdu')
                                                سب دیکھیں     
                                        @else   
                                                View All
                                        @endif
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>
                            <!-- Main Item post -->
                            @forelse ($second_Ca_tWise_News  as $key => $catHindiNews )
                            @if($key  == 0 )
                            
                                <div class="mb-3">
                                    <div class="card border-0 shadow-sm mb-3">
                                        <div class="card-body">
                                            <a  target="_blank"  href="{{route('home.inner',['newsid' => $catHindiNews->id , 'slug' =>  $catHindiNews->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{  isset($catHindiNews->image)? getNewsImage($catHindiNews->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded" loading="lazy">
                                            </a>
                                            <div class="p-t-20">
                                                <h5 class="p-b-5">
                                                    <a  target="_blank"  href="{{route('home.inner',['newsid' => $catHindiNews->id , 'slug' =>  $catHindiNews->slug ])}}"class="f1-s-5 cl2 hov-cl10 trans-03">
                                                        {!!  Str::limit($catHindiNews->title, 80) ?? "NA" !!}
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    @if (strpos($catHindiNews->category_id, ',') === false)
                                                    {{-- Single category ID --}}
                                                    <a  target="_blank"  href="{{ route('home.category', ['id' => $catHindiNews->getmenu->id, 'slug' => createSlug($catHindiNews->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        @if (session()->get('language') === 'hindi')
                                                            {{$catHindiNews['getmenu']['category_hin'] ?? "NA"}}:
                                                        @elseif (session()->get('language') === 'english')
                                                            {{$catHindiNews['getmenu']['category_en'] ?? "NA"}}:
                                                        @elseif (session()->get('language') === 'punjabi')
                                                            {{$catHindiNews['getmenu']['category_pbi'] ?? "NA"}}:
                                                        @elseif (session()->get('language') === 'urdu')
                                                            {{$catHindiNews['getmenu']['category_urdu'] ?? "NA"}}:
                                                        @else   
                                                            {{$catHindiNews['getmenu']['category_en'] ?? "NA"}}:
                                                        @endif
                                                    </a>
                                                @else
                                                  {{-- Multiple category IDs --}}
                                                @php
                                                        $categoryIdsArray = explode(',', $catHindiNews->category_id);
                                                        $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id' ,3)->get();
                                                @endphp
                                                @foreach ($categories as $category)
                                                    <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        @if (session()->get('language') === 'hindi')
                                                            {{ $category->category_hin ?? "NA" }}:
                                                        @elseif (session()->get('language') === 'english')
                                                            {{ $category->category_en ?? "NA" }}:
                                                        @elseif (session()->get('language') === 'punjabi')
                                                            {{ $category->category_pbi ?? "NA" }}:
                                                        @elseif (session()->get('language') === 'urdu')
                                                            {{$category->category_urdu ?? "NA" }}:
                                                        @else   
                                                            {{ $category->category_en ?? "NA" }}:
                                                        @endif
                                                    </a>
                                                @endforeach
                                                @endif
                                                    
                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>
                                                    <span class="f1-s-3">
                                                        {!! carbon\Carbon::parse($catHindiNews->post_date)->format('M d, Y') ?? "NA" !!}
            
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a target="_blank"  href="{{route('home.inner',['newsid' => $catHindiNews->id , 'slug' =>  $catHindiNews->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {!!  Str::limit($catHindiNews->title, 65) ?? "NA" !!}
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                 
            
                                                    @if (strpos($catHindiNews->category_id, ',') === false)
                                                    {{-- Single category ID --}}
                                                    <a  target="_blank"  href="{{ route('home.category', ['id' => $catHindiNews->getmenu->id, 'slug' => createSlug($catHindiNews->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        @if (session()->get('language') === 'hindi')
                                                            {{$catHindiNews['getmenu']['category_hin'] ?? "NA"}}:
                                                        @elseif (session()->get('language') === 'english')
                                                            {{$catHindiNews['getmenu']['category_en'] ?? "NA"}}:
                                                        @elseif (session()->get('language') === 'punjabi')
                                                            {{$catHindiNews['getmenu']['category_pbi'] ?? "NA"}}:
                                                        @elseif (session()->get('language') === 'urdu')
                                                            {{$catHindiNews['getmenu']['category_urdu'] ?? "NA"}}:
                                                        @else   
                                                            {{$catHindiNews['getmenu']['category_en'] ?? "NA"}}:
                                                        @endif
                                                    </a>
                                                @else
                                                  {{-- Multiple category IDs --}}
                                                @php
                                                        $categoryIdsArray = explode(',', $catHindiNews->category_id);
                                                        $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id' ,3)->get();
                                                @endphp
                                                @foreach ($categories as $category)
                                                    <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        @if (session()->get('language') === 'hindi')
                                                            {{ $category->category_hin ?? "NA" }}:
                                                        @elseif (session()->get('language') === 'english')
                                                            {{ $category->category_en ?? "NA" }}:
                                                        @elseif (session()->get('language') === 'punjabi')
                                                            {{ $category->category_pbi ?? "NA" }}:
                                                        @elseif (session()->get('language') === 'urdu')
                                                            {{$category->category_urdu ?? "NA" }}:
                                                        @else   
                                                            {{ $category->category_en ?? "NA" }}:
                                                        @endif
                                                    </a>
                                                @endforeach
                                                @endif
                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>
                                                    <span class="f1-s-3">
                                                        {!! carbon\Carbon::parse($catHindiNews->post_date)->format('M d, Y') ?? "NA" !!}
                                                    </span>
                                                </span>
                                            </div>
                                            <a target="_blank"   href="{{route('home.inner',['newsid' => $catHindiNews->id , 'slug' =>  $catHindiNews->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{  isset($catHindiNews->thumbnail)? getThumbnail($catHindiNews->thumbnail)  : getNewsImage($catHindiNews->image)   }}" alt="" class="img-fluid rounded " loading="lazy">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                               @empty
                                    @switch(session()->get('language'))
                                    @case('hindi')
                                            <p class="text-center text-danger"> {!! "कोई खबर नहीं मिली" !!}     </p>
                                        @break
                                    @case('punjabi')
                                            <p class="text-center text-danger">   {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ' !!}</p>
                                        @break
                                    @case('urdu')
                                        <p class="text-center text-danger">   {!! 'کوئی خبر نہیں ملی' !!}</p>
                                        @break
                                    @case('english')
                                        <p class="text-center text-danger">   {{" No news found"}}</p>
                                    @break
                                    @default
                                        <p class="text-center text-danger">   {{" No news found"}}</p>
                                    @endswitch
                              @endforelse

                        </div>
                        {{--   Chandigarh news section end    --}}

                        {{-- Haryana/Himachal news section  start  --}}
                        <div class="col-sm-6 p-b-25">
                                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                                    <h3 class="f1-m-2 cl17 tab01-title">
                                            @if (session()->get('language') === 'hindi')
                                                {{ $getThirdCatName->category_hin  ?? "NA"}}
                                            @elseif (session()->get('language') === 'english')
                                                {{ $getThirdCatName->category_en  ?? "NA"}}
                                            @elseif (session()->get('language') === 'punjabi')
                                                {{ $getThirdCatName->category_pbi ?? "NA"}}
                                            @elseif (session()->get('language') === 'urdu')
                                                {{ $getThirdCatName->category_urdu ?? "NA"}}
                                            @else   
                                                {{ $getThirdCatName->category_en  ?? "NA"}}
                                            @endif
                                    </h3>
                                    <a href="{{route('home.category', ['id' => $getThirdCatName->id, 'slug' => createSlug($getThirdCatName->category_en)  ])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">

                                        @if (session()->get('language') === 'hindi')
                                                सभी को देखें
                                        @elseif (session()->get('language') === 'english')
                                                View All
                                        @elseif (session()->get('language') === 'punjabi')
                                                ਸਭ ਦੇਖੋ 
                                        @elseif (session()->get('language') === 'urdu')
                                                سب دیکھیں     
                                        @else   
                                                View All
                                        @endif
                                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                    </a>
                                </div>
                                <!-- Main Item post -->
                                @forelse ($third_Cat_Wise_News  as $key => $cat3_News )
                                @if($key  == 0 )
                                
                                    <div class="mb-3">
                                        <div class="card border-0 shadow-sm mb-3">
                                            <div class="card-body">
                                                <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat3_News->id , 'slug' =>  $cat3_News->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                                    <img src="{{  isset($cat3_News->image)? getNewsImage($cat3_News->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded" loading="lazy">
                                                </a>
                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat3_News->id , 'slug' =>  $cat3_News->slug ])}}"class="f1-s-5 cl2 hov-cl10 trans-03">
                                                            {!!  Str::limit($cat3_News->title, 80) ?? "NA" !!}
                                                        </a>
                                                    </h5>
                                                    <span class="cl8">
                                
                                                        @if (strpos($cat3_News->category_id, ',') === false)
                                                        {{-- Single category ID --}}
                                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $cat3_News->getmenu->id, 'slug' => createSlug($cat3_News->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                                @if (session()->get('language') === 'hindi')
                                                                    {{$cat3_News['getmenu']['category_hin'] ?? "NA"}}:
                                                                @elseif (session()->get('language') === 'english')
                                                                    {{$cat3_News['getmenu']['category_en'] ?? "NA"}}:
                                                                @elseif (session()->get('language') === 'punjabi')
                                                                    {{$cat3_News['getmenu']['category_pbi'] ?? "NA"}}:
                                                                @elseif (session()->get('language') === 'urdu')
                                                                    {{$cat3_News['getmenu']['category_urdu'] ?? "NA"}}:
                                                                @else   
                                                                    {{$cat3_News['getmenu']['category_en'] ?? "NA"}}:
                                                                @endif
                                                            </a>
                                                        @else
                                                        {{-- Multiple category IDs --}}
                                                        @php
                                                                $categoryIdsArray = explode(',', $cat3_News->category_id);
                                                                $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id' ,4)->get();
                                                        @endphp
                                                        @foreach ($categories as $category)
                                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                                @if (session()->get('language') === 'hindi')
                                                                    {{ $category->category_hin ?? "NA" }}:
                                                                @elseif (session()->get('language') === 'english')
                                                                    {{ $category->category_en ?? "NA" }}:
                                                                @elseif (session()->get('language') === 'punjabi')
                                                                    {{ $category->category_pbi ?? "NA" }}:
                                                                @elseif (session()->get('language') === 'urdu')
                                                                    {{$category->category_urdu ?? "NA" }}:
                                                                @else   
                                                                    {{ $category->category_en ?? "NA" }}:
                                                                @endif
                                                            </a>
                                                        @endforeach
                                                        @endif
                                                            
                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>
                                                        <span class="f1-s-3">
                                                            {!! carbon\Carbon::parse($cat3_News->post_date)->format('M d, Y') ?? "NA" !!}
                
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="card border-0 shadow-sm mb-3">
                                        <div class="card-body">
                                            <div class="flex-wr-sb-s">
                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a target="_blank"  href="{{route('home.inner',['newsid' => $cat3_News->id , 'slug' =>  $cat3_News->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            {!!  Str::limit($cat3_News->title, 65) ?? "NA" !!}
                                                        </a>
                                                    </h5>
                                                    <span class="cl8">
                                                        @if (strpos($cat3_News->category_id, ',') === false)
                                                        {{-- Single category ID --}}
                                                        <a  target="_blank"  href="{{ route('home.category', ['id' => $cat3_News->getmenu->id, 'slug' => createSlug($cat3_News->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                            @if (session()->get('language') === 'hindi')
                                                                {{$cat3_News['getmenu']['category_hin'] ?? "NA"}}:
                                                            @elseif (session()->get('language') === 'english')
                                                                {{$cat3_News['getmenu']['category_en'] ?? "NA"}}:
                                                            @elseif (session()->get('language') === 'punjabi')
                                                                {{$cat3_News['getmenu']['category_pbi'] ?? "NA"}}:
                                                            @elseif (session()->get('language') === 'urdu')
                                                                {{$cat3_News['getmenu']['category_urdu'] ?? "NA"}}:
                                                            @else   
                                                                {{$cat3_News['getmenu']['category_en'] ?? "NA"}}:
                                                            @endif
                                                        </a>
                                                    @else
                                                    {{-- Multiple category IDs --}}
                                                    @php
                                                            $categoryIdsArray = explode(',', $cat3_News->category_id);
                                                            $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id' ,4)->get();
                                                    @endphp
                                                    @foreach ($categories as $category)
                                                        <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                            @if (session()->get('language') === 'hindi')
                                                                {{ $category->category_hin ?? "NA" }}:
                                                            @elseif (session()->get('language') === 'english')
                                                                {{ $category->category_en ?? "NA" }}:
                                                            @elseif (session()->get('language') === 'punjabi')
                                                                {{ $category->category_pbi ?? "NA" }}:
                                                            @elseif (session()->get('language') === 'urdu')
                                                                {{$category->category_urdu ?? "NA" }}:
                                                            @else   
                                                                {{ $category->category_en ?? "NA" }}:
                                                            @endif
                                                        </a>
                                                    @endforeach
                                                    @endif
                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>
                                                        <span class="f1-s-3">
                                                            {!! carbon\Carbon::parse($cat3_News->post_date)->format('M d, Y') ?? "NA" !!}
                                                        </span>
                                                    </span>
                                                </div>
                                                <a target="_blank"   href="{{route('home.inner',['newsid' => $cat3_News->id , 'slug' =>  $cat3_News->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="{{  isset($cat3_News->thumbnail)? getThumbnail($cat3_News->thumbnail)  :getNewsImage($cat3_News->image)  }}" alt="" class="img-fluid rounded" loading="lazy">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                @switch(session()->get('language'))
                                @case('hindi')
                                        <p class="text-center text-danger"> {!! "कोई खबर नहीं मिली" !!}     </p>
                                    @break
                                @case('punjabi')
                                        <p class="text-center text-danger">   {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ' !!}</p>
                                    @break
                                @case('urdu')
                                    <p class="text-center text-danger">   {!! 'کوئی خبر نہیں ملی' !!}</p>
                                    @break
                                @case('english')
                                    <p class="text-center text-danger">   {{" No news found"}}</p>
                                @break
                                @default
                                    <p class="text-center text-danger">   {{" No news found"}}</p>
                                @endswitch
                            @endforelse

                     

                        </div>
                    </div>
                </div>
            </div>
            {{-- side news  section  --}}

            <div class="col-md-10 col-lg-4">
                <div class="p-b-20">
                    <div class="p-b-30">
                        <div class="how2 how2-cl5 mb-4 flex-s-c bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                @if (session()->get('language') === 'hindi')
                                            {{ $getFourthCatName->category_hin  ?? "NA"}}
                                @elseif (session()->get('language') === 'english')
                                            {{ $getFourthCatName->category_en  ?? "NA"}}
                                @elseif (session()->get('language') === 'punjabi')
                                            {{ $getFourthCatName->category_pbi ?? "NA"}}
                                @elseif (session()->get('language') === 'urdu')
                                            {{ $getFourthCatName->category_urdu ?? "NA"}}
                                @else   
                                            {{ $getFourthCatName->category_en  ?? "NA"}}
                                @endif
                            </h3>
                        </div>

                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">

                                     @forelse ($fourthCatWise_News  as $key => $cat_HinNews )
                                @if($key  == 0 )
                                    <div class="mb-3">
                                        <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                            <div class="p-b-10">
                                                <h5 class="p-b-5">
                                                    <a target="_blank" href="{{route('home.inner',['newsid' => $cat_HinNews->id , 'slug' =>  $cat_HinNews->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {!!  Str::limit($cat_HinNews->title, 85) ?? "NA" !!}
                                                        
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <span class="f1-s-3">
                                                        {!! carbon\Carbon::parse($cat_HinNews->post_date)->format('M d, Y') ?? "NA" !!}
                                                    </span>
                                                </span>
                                            </div>
                                            <a target="_blank" href="{{route('home.inner',['newsid' => $cat_HinNews->id , 'slug' =>  $cat_HinNews->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{  isset($cat_HinNews->image)? getNewsImage($cat_HinNews->image)  : asset('assets/images/post-36.jpg')}}" alt="IMG" class="img-fluid rounded" loading="lazy">
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                            <div class="flex-wr-sb-s">
                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="{{route('home.inner',['newsid' => $cat_HinNews->id , 'slug' =>  $cat_HinNews->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            {!!  Str::limit($cat_HinNews->title, 65) ?? "NA" !!}
                                                        </a>
                                                    </h5>
                                                    <span class="cl8">
                                                        <span class="f1-s-3">
                                                            {!! carbon\Carbon::parse($cat_HinNews->post_date)->format('M d, Y') ?? "NA" !!}
                                                        </span>
                                                    </span>
                                                </div>
                                                <a href="{{route('home.inner',['newsid' => $cat_HinNews->id , 'slug' =>  $cat_HinNews->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="{{  isset($cat_HinNews->thumbnail)? getThumbnail($cat_HinNews->thumbnail)  : getNewsImage($cat_HinNews->image)  }}" alt="" class="img-fluid rounded" loading="lazy">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                             @empty

                                @switch(session()->get('language'))
                                @case('hindi')
                                        <p class="text-center text-danger"> {!! "कोई खबर नहीं मिली" !!}     </p>
                                    @break
                                @case('punjabi')
                                        <p class="text-center text-danger">   {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ' !!}</p>
                                    @break
                                @case('urdu')
                                    <p class="text-center text-danger">   {!! 'کوئی خبر نہیں ملی' !!}</p>
                                    @break
                                @case('english')
                                    <p class="text-center text-danger">   {{" No news found"}}</p>
                                @break
                                @default
                                    <p class="text-center text-danger">   {{" No news found"}}</p>
                                @endswitch

                             @endforelse

                                <div class="mb-3 mt-4 text-center">
                                    <a href="{{route('home.category', ['id' => $getFourthCatName->id, 'slug' => createSlug($getFourthCatName->category_en)  ])}}" class="btn btn-primary px-5">

                                        @if (session()->get('language') === 'hindi')
                                                सभी को देखें
                                        @elseif (session()->get('language') === 'english')
                                                View All
                                        @elseif (session()->get('language') === 'punjabi')
                                                ਸਭ ਦੇਖੋ
                                        @elseif (session()->get('language') === 'urdu')
                                                سب دیکھیں     
                                        @else   
                                                View All
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Subscribe -->
                    {{-- <div class="bg10 p-rl-35 p-t-28 p-b-30 m-b-55">
                        <h5 class="f1-m-5 cl0 p-b-10">
                            Subscribe
                        </h5>
                        <p class="f1-s-1 cl0 p-b-25">
                            Get all latest content delivered to your email a few times a month.
                        </p>
                        <form class="size-a-9 pos-relative">
                            <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="Email">
                            <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </form>
                    </div> --}}
                </div>
            </div>
            {{-- side news  section  --}}
        </div>
    </div>
</section>

{{-- home bottom add  --}}
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                @if(isset($homeBottomAdd))
                <a href="{{$homeBottomAdd->link_add ?? '#'}}">
                    <img src="{{ getAddImage($homeBottomAdd->image)  }}" class="img-fluid" alt="" loading="lazy">
                </a>
                @else
                @endif
            </div>
        </div>
    </div>
</section>
{{-- home bottom add  --}}


<section class="p-t-50">
    <div class="container">
        <div class="row">
            {{-- bottom first section  --}}
            <div class="col-sm-4 p-b-25">
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        @if (session()->get('language') === 'hindi')
                                    {{ $get_bottom1_Menus->category_hin  ?? "NA"}}
                        @elseif (session()->get('language') === 'english')
                                    {{ $get_bottom1_Menus->category_en  ?? "NA"}}
                        @elseif (session()->get('language') === 'punjabi')
                                    {{ $get_bottom1_Menus->category_pbi ?? "NA"}}
                        @elseif (session()->get('language') === 'urdu')
                                    {{ $get_bottom1_Menus->category_urdu ?? "NA"}}
                        @else   
                                    {{ $get_bottom1_Menus->category_en  ?? "NA"}}
                        @endif
                    </h3>
                    <a href="{{route('home.category', ['id' => $get_bottom1_Menus->id, 'slug' => createSlug($get_bottom1_Menus->category_en)  ])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">

                        @if (session()->get('language') === 'hindi')
                                        सभी को देखें
                            @elseif (session()->get('language') === 'english')
                                        View All
                            @elseif (session()->get('language') === 'punjabi')
                                        ਸਭ ਦੇਖੋ
                            @elseif (session()->get('language') === 'urdu')
                                    سب دیکھیں     
                                @else   

                                @endif
                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                    </a>
                </div>
                <!-- Main Item post -->
         
                @forelse ($five_CatWise_News  as $key => $cat5_News )
                @if($key  == 0 )
                {{-- big  pic news --}}
                <div class="mb-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <a target="_blank"  href="{{route('home.inner',['newsid' => $cat5_News->id , 'slug' =>  $cat5_News->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                <img src="{{  isset($cat5_News->image)? getNewsImage($cat5_News->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded">
                            </a>
                            <div class="p-t-20">
                                <h5 class="p-b-5">
                                    <a target="_blank"  href="{{route('home.inner',['newsid' => $cat5_News->id , 'slug' =>  $cat5_News->slug  ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                        {!!  Str::limit($cat5_News->title, 85) ?? "NA" !!}
                                    </a>
                                </h5>
                                <span class="cl8">
                  
                                    @if (strpos($cat5_News->category_id, ',') === false)
                                    {{-- Single category ID --}}
                                        <a  target="_blank"  href="{{ route('home.category', ['id' => $cat5_News->getmenu->id, 'slug' => createSlug($cat5_News->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            @if (session()->get('language') === 'hindi')
                                                {{$cat5_News['getmenu']['category_hin'] ?? "NA"}}:
                                            @elseif (session()->get('language') === 'english')
                                                {{$cat5_News['getmenu']['category_en'] ?? "NA"}}:
                                            @elseif (session()->get('language') === 'punjabi')
                                                {{$cat5_News['getmenu']['category_pbi'] ?? "NA"}}:
                                            @elseif (session()->get('language') === 'urdu')
                                                {{$cat5_News['getmenu']['category_urdu'] ?? "NA"}}:
                                            @else   
                                                {{$cat5_News['getmenu']['category_en'] ?? "NA"}}:
                                            @endif
                                        </a>
                                    @else
                                    {{-- Multiple category IDs --}}
                                    @php
                                            $categoryIdsArray = explode(',', $cat5_News->category_id);
                                            $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id' ,6)->get();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            @if (session()->get('language') === 'hindi')
                                                {{ $category->category_hin ?? "NA" }}:
                                            @elseif (session()->get('language') === 'english')
                                                {{ $category->category_en ?? "NA" }}:
                                            @elseif (session()->get('language') === 'punjabi')
                                                {{ $category->category_pbi ?? "NA" }}:
                                            @elseif (session()->get('language') === 'urdu')
                                                {{$category->category_urdu ?? "NA" }}:
                                            @else   
                                                {{ $category->category_en ?? "NA" }}:
                                            @endif
                                        </a>
                                    @endforeach
                                    @endif
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        {!! carbon\Carbon::parse($cat5_News->post_date)->format('M d, Y') ?? "NA" !!}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                @else
                {{-- normal pics news  --}}
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a target="_blank"  href="{{route('home.inner',['newsid' => $cat5_News->id , 'slug' =>  $cat5_News->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        {!!  Str::limit($cat5_News->title, 60) ?? "NA" !!}
                                    </a>
                                </h5>
                                <span class="cl8">
                                    @if (strpos($cat5_News->category_id, ',') === false)
                                    {{-- Single category ID --}}
                                        <a  target="_blank"  href="{{ route('home.category', ['id' => $cat5_News->getmenu->id, 'slug' => createSlug($cat5_News->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            @if (session()->get('language') === 'hindi')
                                                {{$cat5_News['getmenu']['category_hin'] ?? "NA"}}:
                                            @elseif (session()->get('language') === 'english')
                                                {{$cat5_News['getmenu']['category_en'] ?? "NA"}}:
                                            @elseif (session()->get('language') === 'punjabi')
                                                {{$cat5_News['getmenu']['category_pbi'] ?? "NA"}}:
                                            @elseif (session()->get('language') === 'urdu')
                                                {{$cat5_News['getmenu']['category_urdu'] ?? "NA"}}:
                                            @else   
                                                {{$cat5_News['getmenu']['category_en'] ?? "NA"}}:
                                            @endif
                                        </a>
                                    @else
                                    {{-- Multiple category IDs --}}
                                    @php
                                            $categoryIdsArray = explode(',', $cat5_News->category_id);
                                            $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id' ,6)->get();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            @if (session()->get('language') === 'hindi')
                                                {{ $category->category_hin ?? "NA" }}:
                                            @elseif (session()->get('language') === 'english')
                                                {{ $category->category_en ?? "NA" }}:
                                            @elseif (session()->get('language') === 'punjabi')
                                                {{ $category->category_pbi ?? "NA" }}:
                                            @elseif (session()->get('language') === 'urdu')
                                                {{$category->category_urdu ?? "NA" }}:
                                            @else   
                                                {{ $category->category_en ?? "NA" }}:
                                            @endif
                                        </a>
                                    @endforeach
                                    @endif
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        {!! carbon\Carbon::parse($cat5_News->post_date)->format('M d, Y') ?? "NA" !!}
                                    </span>
                                </span>
                            </div>
                            <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat5_News->id , 'slug' =>  $cat5_News->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{   isset($cat5_News->thumbnail)? getThumbnail($cat5_News->thumbnail)  : getNewsImage($cat5_News->image)   }}" alt="" class="img-fluid rounded" loading="lazy">
                            </a>
                        </div>
                    </div>
                </div>
                @endif
    
        
            
                  @empty
                    @switch(session()->get('language'))
                    @case('hindi')
                            <p class="text-center text-danger"> {!! "कोई खबर नहीं मिली" !!}     </p>
                        @break
                    @case('punjabi')
                            <p class="text-center text-danger">   {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ' !!}</p>
                        @break
                    @case('urdu')
                        <p class="text-center text-danger">   {!! 'کوئی خبر نہیں ملی' !!}</p>
                        @break
                    @case('english')
                        <p class="text-center text-danger">   {{" No news found"}}</p>
                    @break
                    @default
                        <p class="text-center text-danger">   {{" No news found"}}</p>
                    @endswitch
                 @endforelse

            </div>
            {{-- bottom first section  end --}}

            <div class="col-sm-4 p-b-25">
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        @if (session()->get('language') === 'hindi')
                                    {{ $get_bottom2_Menus->category_hin  ?? "NA"}}
                        @elseif (session()->get('language') === 'english')
                                    {{ $get_bottom2_Menus->category_en  ?? "NA"}}
                        @elseif (session()->get('language') === 'punjabi')
                                    {{ $get_bottom2_Menus->category_pbi ?? "NA"}}
                        @elseif (session()->get('language') === 'urdu')
                                    {{ $get_bottom2_Menus->category_urdu ?? "NA"}}
                        @else   
                                    {{ $get_bottom2_Menus->category_en  ?? "NA"}}
                        @endif
                    </h3>
                    <a href="{{route('home.category', ['id' => $get_bottom2_Menus->id, 'slug' => createSlug($get_bottom2_Menus->category_en)  ])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                        @if (session()->get('language') === 'hindi')
                                सभी को देखें
                        @elseif (session()->get('language') === 'english')
                                    View All
                        @elseif (session()->get('language') === 'punjabi')
                                    ਸਭ ਦੇਖੋ
                        @elseif (session()->get('language') === 'urdu')
                                    سب دیکھیں     
                        @else   
        
                        @endif
                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                    </a>
                </div>
                <!-- Main Item post -->
      
                @forelse ($six_CatWise_News  as $key => $cat__News )
                @if($key  == 0 )
                    <div class="mb-3">
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <a target="_blank"  href="{{route('home.inner',['newsid' => $cat__News->id , 'slug' =>  $cat__News->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{  isset($cat__News->image)? getNewsImage($cat__News->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded" loading="lazy">
                                </a>
                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a target="_blank"  href="{{route('home.inner',['newsid' => $cat__News->id , 'slug' =>  $cat__News->slug  ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                            {!!  Str::limit($cat__News->title, 85) ?? "NA" !!}
                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        @if (strpos($cat__News->category_id, ',') === false)
                                        {{-- Single category ID --}}
                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $cat__News->getmenu->id, 'slug' => createSlug($cat__News->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                @if (session()->get('language') === 'hindi')
                                                    {{$cat__News['getmenu']['category_hin'] ?? "NA"}}:
                                                @elseif (session()->get('language') === 'english')
                                                    {{$cat__News['getmenu']['category_en'] ?? "NA"}}:
                                                @elseif (session()->get('language') === 'punjabi')
                                                    {{$cat__News['getmenu']['category_pbi'] ?? "NA"}}:
                                                @elseif (session()->get('language') === 'urdu')
                                                    {{$cat__News['getmenu']['category_urdu'] ?? "NA"}}:
                                                @else   
                                                    {{$cat__News['getmenu']['category_en'] ?? "NA"}}:
                                                @endif
                                            </a>
                                        @else
                                        {{-- Multiple category IDs --}}
                                        @php
                                                $categoryIdsArray = explode(',', $cat__News->category_id);
                                                $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id', 7)->get();
                                        @endphp
                                        @foreach ($categories as $category)
                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                @if (session()->get('language') === 'hindi')
                                                    {{ $category->category_hin ?? "NA" }}:
                                                @elseif (session()->get('language') === 'english')
                                                    {{ $category->category_en ?? "NA" }}:
                                                @elseif (session()->get('language') === 'punjabi')
                                                    {{ $category->category_pbi ?? "NA" }}:
                                                @elseif (session()->get('language') === 'urdu')
                                                    {{$category->category_urdu ?? "NA" }}:
                                                @else   
                                                    {{ $category->category_en ?? "NA" }}:
                                                @endif
                                            </a>
                                        @endforeach
                                        @endif
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            {!! carbon\Carbon::parse($cat__News->post_date)->format('M d, Y') ?? "NA" !!}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @else       
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="flex-wr-sb-s">
                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a target="_blank"  href="{{route('home.inner',['newsid' => $cat__News->id , 'slug' =>  $cat__News->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            {!!  Str::limit($cat__News->title, 60) ?? "NA" !!}
                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        @if (strpos($cat__News->category_id, ',') === false)
                                        {{-- Single category ID --}}
                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $cat__News->getmenu->id, 'slug' => createSlug($cat__News->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                @if (session()->get('language') === 'hindi')
                                                    {{$cat__News['getmenu']['category_hin'] ?? "NA"}}
                                                @elseif (session()->get('language') === 'english')
                                                    {{$cat__News['getmenu']['category_en'] ?? "NA"}}
                                                @elseif (session()->get('language') === 'punjabi')
                                                    {{$cat__News['getmenu']['category_pbi'] ?? "NA"}},
                                                @elseif (session()->get('language') === 'urdu')
                                                    {{$cat__News['getmenu']['category_urdu'] ?? "NA"}}
                                                @else   
                                                    {{$cat__News['getmenu']['category_en'] ?? "NA"}}
                                                @endif
                                            </a>
                                        @else
                                        {{-- Multiple category IDs --}}
                                        @php
                                                $categoryIdsArray = explode(',', $cat__News->category_id);
                                                $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id', 7)->get();
                                        @endphp
                                        @foreach ($categories as $category)
                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                @if (session()->get('language') === 'hindi')
                                                    {{ $category->category_hin ?? "NA" }}
                                                @elseif (session()->get('language') === 'english')
                                                    {{ $category->category_en ?? "NA" }}
                                                @elseif (session()->get('language') === 'punjabi')
                                                    {{ $category->category_pbi ?? "NA" }}
                                                @elseif (session()->get('language') === 'urdu')
                                                    {{$category->category_urdu ?? "NA" }}
                                                @else   
                                                    {{ $category->category_en ?? "NA" }}
                                                @endif
                                            </a>
                                        @endforeach
                                        @endif
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            {!! carbon\Carbon::parse($cat__News->post_date)->format('M d, Y') ?? "NA" !!}
                                        </span>
                                    </span>
                                </div>
                                <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat__News->id , 'slug' =>  $cat__News->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{   isset($cat__News->thumbnail)? getThumbnail($cat__News->thumbnail)  : getNewsImage($cat__News->image)}}" alt="" class="img-fluid rounded">
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @empty

                    @switch(session()->get('language'))
                    @case('hindi')
                            <p class="text-center text-danger"> {!! "कोई खबर नहीं मिली" !!}     </p>
                        @break
                    @case('punjabi')
                            <p class="text-center text-danger">   {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ' !!}</p>
                        @break
                    @case('urdu')
                        <p class="text-center text-danger">   {!! 'کوئی خبر نہیں ملی' !!}</p>
                        @break
                    @case('english')
                        <p class="text-center text-danger">   {{" No news found"}}</p>
                    @break
                    @default
                        <p class="text-center text-danger">   {{" No news found"}}</p>
                    @endswitch

            @endforelse
            </div>
            <div class="col-sm-4 p-b-25">
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        @if (session()->get('language') === 'hindi')
                                        {{ $get_bottom3_Menus->category_hin  ?? "NA"}}
                        @elseif (session()->get('language') === 'english')
                                    {{ $get_bottom3_Menus->category_en  ?? "NA"}}
                        @elseif (session()->get('language') === 'punjabi')
                                    {{ $get_bottom3_Menus->category_pbi ?? "NA"}}
                        @elseif (session()->get('language') === 'urdu')
                                    {{ $get_bottom3_Menus->category_urdu ?? "NA"}}
                        @else   
                                    {{ $get_bottom3_Menus->category_en  ?? "NA"}}
                        @endif
                    </h3>
                    <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                          @if (session()->get('language') === 'hindi')
                                        सभी को देखें
                            @elseif (session()->get('language') === 'english')
                                    View All
                            @elseif (session()->get('language') === 'punjabi')
                                    ਸਭ ਦੇਖੋ
                            @elseif (session()->get('language') === 'urdu')
                                سب دیکھیں     
                            @else   
                
                            @endif
                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                    </a>
                </div>
                <!-- Main Item post -->
                @forelse ($seven_CatWise_News  as $key => $cat_News )
                @if($key  == 0 )
                 <div class="mb-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_News->id , 'slug' =>  $cat_News->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                <img src="{{  isset($cat_News->image)? getNewsImage($cat_News->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded" loading="lazy">
                            </a>
                            <div class="p-t-20">
                                <h5 class="p-b-5">
                                    <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_News->id , 'slug' =>  $cat_News->slug  ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                        {!!  Str::limit($cat_News->title, 85) ?? "NA" !!}
                                    </a>
                                </h5>
                                <span class="cl8">
                                    @if (strpos($cat_News->category_id, ',') === false)
                                    {{-- Single category ID --}}
                                        <a  target="_blank"  href="{{ route('home.category', ['id' => $cat_News->getmenu->id, 'slug' => createSlug($cat_News->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            @if (session()->get('language') === 'hindi')
                                                {{$cat_News['getmenu']['category_hin'] ?? "NA"}}:
                                            @elseif (session()->get('language') === 'english')
                                                {{$cat_News['getmenu']['category_en'] ?? "NA"}}:
                                            @elseif (session()->get('language') === 'punjabi')
                                                {{$cat_News['getmenu']['category_pbi'] ?? "NA"}}:
                                            @elseif (session()->get('language') === 'urdu')
                                                {{$cat_News['getmenu']['category_urdu'] ?? "NA"}}:
                                            @else   
                                                {{$cat_News['getmenu']['category_en'] ?? "NA"}}:
                                            @endif
                                        </a>
                                    @else
                                    {{-- Multiple category IDs --}}
                                    @php
                                            $categoryIdsArray = explode(',', $cat_News->category_id);
                                            $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id', 8)->get();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            @if (session()->get('language') === 'hindi')
                                                {{ $category->category_hin ?? "NA" }}:
                                            @elseif (session()->get('language') === 'english')
                                                {{ $category->category_en ?? "NA" }}:
                                            @elseif (session()->get('language') === 'punjabi')
                                                {{ $category->category_pbi ?? "NA" }}:
                                            @elseif (session()->get('language') === 'urdu')
                                                {{$category->category_urdu ?? "NA" }}:
                                            @else   
                                                {{ $category->category_en ?? "NA" }}:
                                            @endif
                                        </a>
                                    @endforeach
                                    @endif
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        {!! carbon\Carbon::parse($cat_News->post_date)->format('M d, Y') ?? "NA" !!}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                 </div>
             @else       
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_News->id , 'slug' =>  $cat_News->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        {!!  Str::limit($cat_News->title, 60) ?? "NA" !!}
                                    </a>
                                </h5>
                                <span class="cl8">
                                    @if (strpos($cat_News->category_id, ',') === false)
                                    {{-- Single category ID --}}
                                        <a  target="_blank"  href="{{ route('home.category', ['id' => $cat_News->getmenu->id, 'slug' => createSlug($cat_News->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            @if (session()->get('language') === 'hindi')
                                                {{$cat_News['getmenu']['category_hin'] ?? "NA"}}:
                                            @elseif (session()->get('language') === 'english')
                                                {{$cat_News['getmenu']['category_en'] ?? "NA"}}:
                                            @elseif (session()->get('language') === 'punjabi')
                                                {{$cat_News['getmenu']['category_pbi'] ?? "NA"}}:
                                            @elseif (session()->get('language') === 'urdu')
                                                {{$cat_News['getmenu']['category_urdu'] ?? "NA"}}:
                                            @else   
                                                {{$cat_News['getmenu']['category_en'] ?? "NA"}}:
                                            @endif
                                        </a>
                                    @else
                                    {{-- Multiple category IDs --}}
                                    @php
                                            $categoryIdsArray = explode(',', $cat_News->category_id);
                                            $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id', 8)->get();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            @if (session()->get('language') === 'hindi')
                                                {{ $category->category_hin ?? "NA" }}:
                                            @elseif (session()->get('language') === 'english')
                                                {{ $category->category_en ?? "NA" }}:
                                            @elseif (session()->get('language') === 'punjabi')
                                                {{ $category->category_pbi ?? "NA" }}:
                                            @elseif (session()->get('language') === 'urdu')
                                                {{$category->category_urdu ?? "NA" }}:
                                            @else   
                                                {{ $category->category_en ?? "NA" }}:
                                            @endif
                                        </a>
                                    @endforeach
                                    @endif
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        {!! carbon\Carbon::parse($cat_News->post_date)->format('M d, Y') ?? "NA" !!}
                                    </span>
                                </span>
                            </div>
                            <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat_News->id , 'slug' =>  $cat_News->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{   isset($cat_News->thumbnail)? getThumbnail($cat_News->thumbnail)  : getNewsImage($cat_News->image)}}" alt="" class="img-fluid rounded" loading="lazy" >
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @empty
        @switch(session()->get('language'))
        @case('hindi')
                <p class="text-center text-danger"> {!! "कोई खबर नहीं मिली" !!}     </p>
            @break
        @case('punjabi')
                <p class="text-center text-danger">   {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ' !!}</p>
            @break
        @case('urdu')
            <p class="text-center text-danger">   {!! 'کوئی خبر نہیں ملی' !!}</p>
            @break
        @case('english')
            <p class="text-center text-danger">   {{" No news found"}}</p>
        @break
        @default
            <p class="text-center text-danger">   {{" No news found"}}</p>
        @endswitch
        
        @endforelse

            </div>
        </div>
    </div>
</section>
@stop