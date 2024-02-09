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

<section class="p-t-30">
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
</section>
<section class="p-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                Latest News
                            </h3>
                        </div>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                <span class="text-danger mr-1">Chandigarh:</span>
                                                ED arrests woman IAS officer Ranu Sahu in alleged coal levy case in Chandigarh
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <span class="f1-s-3">
                                                Jul 22, 2023
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                <span class="text-danger mr-1">Manipur Live:</span>
                                                Smriti Irani versus Mahua Moitra over Cong's 'FAILED' report card on Manipur
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <span class="f1-s-3">
                                                Jul 22, 2023
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                <span class="text-danger mr-1">Watch |</span>
                                                Bus carrying over 24 passengers gets stuck in water in UP's Bijnor
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <span class="f1-s-3">
                                                Jul 22, 2023
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                <span class="text-danger mr-1">Ludhiana:</span>
                                                Punjab CM: 'Unfortunate' governor doesn't know if special assembly session was legal
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <span class="f1-s-3">
                                                Jul 22, 2023
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                <span class="text-danger mr-1">Maharashtra Live:</span>
                                                Nandini milk price likely to go up by Rs. 3 starting from August 1
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <span class="f1-s-3">
                                                Jul 22, 2023
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="javascript:void()" class="btn btn-primary px-5">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <div class="card bg-white shadow-sm text-center border-0">
                            <div class="card-body">
                                <a href="javascript:void()">
                                    <img src="{{asset('assets')}}/images/ads/v-ad1.gif" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main news -->
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                Top News
                            </h3>
                        </div>
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="p-b-20">
                                    <h5 class="p-b-5">
                                        <a href="javascript:void();" class="f1-m-3 cl2 hov-cl10 trans-03 font-weight-bold">
                                            Ashok Gehlot slams PM for calling Manipur 'his govt' in 'few secs' of speech
                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            National
                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            Jul 22, 2023
                                        </span>
                                    </span>
                                </div>
                                <a href="javascript:void();" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{asset('assets')}}/images/news/n1.jpg" alt="IMG" class="img-fluid rounded">
                                </a>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="flex-wr-sb-s">
                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                Centre sent 'consequence' notice to Twitter for not blocking URLs amid farm stir
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                Punjab
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                Jul 22, 2023
                                            </span>
                                        </span>
                                    </div>
                                    <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('assets')}}/images/post-06.jpg" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="flex-wr-sb-s">
                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                ED arrests woman IAS officer Ranu Sahu in alleged coal levy case in Chandigarh
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                Chandigarh
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                Jul 22, 2023
                                            </span>
                                        </span>
                                    </div>
                                    <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('assets')}}/images/post-05.jpg" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="flex-wr-sb-s">
                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                Centre sent 'consequence' notice to Twitter for not blocking URLs amid farm stir
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                Punjab
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                Jul 22, 2023
                                            </span>
                                        </span>
                                    </div>
                                    <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('assets')}}/images/post-08.jpg" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="flex-wr-sb-s">
                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                ED arrests woman IAS officer Ranu Sahu in alleged coal levy case in Chandigarh
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                Chandigarh
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                Jul 22, 2023
                                            </span>
                                        </span>
                                    </div>
                                    <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('assets')}}/images/post-07.jpg" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="flex-wr-sb-s">
                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                ED arrests woman IAS officer Ranu Sahu in alleged coal levy case in Chandigarh
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                Chandigarh
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                Jul 22, 2023
                                            </span>
                                        </span>
                                    </div>
                                    <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('assets')}}/images/post-04.jpg" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="flex-wr-sb-s">
                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                ED arrests woman IAS officer Ranu Sahu in alleged coal levy case in Chandigarh
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                Chandigarh
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                Jul 22, 2023
                                            </span>
                                        </span>
                                    </div>
                                    <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('assets')}}/images/post-10.jpg" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="text-uppercase text-center small pb-2">Advertisement</p>
                            <a href="javascript:void()">
                                <img src="{{asset('assets')}}/images/ads/ad2.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card bg-white shadow-sm text-center border-0">
                            <div class="card-body">
                                <a href="javascript:void()">
                                    <img src="{{asset('assets')}}/images/ads/ad1.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <div class="card bg-white shadow-sm text-center border-0">
                            <div class="card-body">
                                <a href="javascript:void()">
                                    <img src="{{asset('assets')}}/images/ads/ad2.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Editor's Desk -->
                    @livewire('frontend.advertisement.editor-profile')
                    <!-- Subscribe -->
                    @livewire('frontend.homepage.subscribe.subscribe-form')
                </div>
            </div>
        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2">Advertisement</p>
                <a href="javascript:void()">
                    <img src="{{asset('assets')}}/images/ads/ad3.jpg" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
<section class="p-t-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="p-b-20">
                    <div class="p-b-20">
                        <div class="how2 how2-cl5 mb-4 flex-sb-c bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                Punjab
                            </h3>
                            <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                View all
                                <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Item post -->
                                <div class="m-b-30">
                                    <div class="card border-0 shadow-sm mb-3">
                                        <div class="card-body">
                                            <a href="javascript:void();" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{asset('assets')}}/images/post-05.jpg" alt="IMG" class="img-fluid rounded">
                                            </a>
                                            <div class="p-t-20">
                                                <h5 class="p-b-5">
                                                    <a href="javascript:void();" class="f1-s-5 cl2 hov-cl10 trans-03">
                                                        American live music lorem ipsum dolor sit amet consectetur
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        National
                                                    </a>
                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>
                                                    <span class="f1-s-3">
                                                        Jul 22, 2023
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Boss revokes employee's WFH status, threatens to fire them
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        Punjab
                                                    </a>
                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>
                                                    <span class="f1-s-3">
                                                        Jul 22, 2023
                                                    </span>
                                                </span>
                                            </div>
                                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{asset('assets')}}/images/post-06.jpg" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Boss revokes employee's WFH status, threatens to fire them
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        Punjab
                                                    </a>
                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>
                                                    <span class="f1-s-3">
                                                        Jul 22, 2023
                                                    </span>
                                                </span>
                                            </div>
                                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{asset('assets')}}/images/post-07.jpg" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        Boss revokes employee's WFH status, threatens to fire them
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        Punjab
                                                    </a>
                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>
                                                    <span class="f1-s-3">
                                                        Jul 22, 2023
                                                    </span>
                                                </span>
                                            </div>
                                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{asset('assets')}}/images/post-10.jpg" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Other -->
                    <div class="row">
                        <div class="col-sm-6 p-b-25">
                            <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                                <h3 class="f1-m-2 cl17 tab01-title">
                                    Chandigarh
                                </h3>
                                <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    View all
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>
                            <!-- Main Item post -->
                            <div class="mb-3">
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <a href="javascript:void();" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('assets')}}/images/post-10.jpg" alt="IMG" class="img-fluid rounded">
                                        </a>
                                        <div class="p-t-20">
                                            <h5 class="p-b-5">
                                                <a href="javascript:void();" class="f1-s-5 cl2 hov-cl10 trans-03">
                                                    American live music lorem ipsum dolor sit amet consectetur
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    National
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    Jul 22, 2023
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    Boss revokes employee's WFH status, threatens to fire them
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    Punjab
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    Jul 22, 2023
                                                </span>
                                            </span>
                                        </div>
                                        <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('assets')}}/images/post-11.jpg" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    Boss revokes employee's WFH status, threatens to fire them
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    Punjab
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    Jul 22, 2023
                                                </span>
                                            </span>
                                        </div>
                                        <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('assets')}}/images/post-12.jpg" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    Boss revokes employee's WFH status, threatens to fire them
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    Punjab
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    Jul 22, 2023
                                                </span>
                                            </span>
                                        </div>
                                        <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('assets')}}/images/post-38.jpg" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-b-25">
                            <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                                <h3 class="f1-m-2 cl17 tab01-title">
                                    Haryana/Himachal
                                </h3>
                                <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    View all
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>
                            <!-- Main Item post -->
                            <div class="mb-3">
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <a href="javascript:void();" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('assets')}}/images/post-34.jpg" alt="IMG" class="img-fluid rounded">
                                        </a>
                                        <div class="p-t-20">
                                            <h5 class="p-b-5">
                                                <a href="javascript:void();" class="f1-s-5 cl2 hov-cl10 trans-03">
                                                    American live music lorem ipsum dolor sit amet consectetur
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    National
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    Jul 22, 2023
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    Boss revokes employee's WFH status, threatens to fire them
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    Punjab
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    Jul 22, 2023
                                                </span>
                                            </span>
                                        </div>
                                        <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('assets')}}/images/post-35.jpg" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    Boss revokes employee's WFH status, threatens to fire them
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    Punjab
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    Jul 22, 2023
                                                </span>
                                            </span>
                                        </div>
                                        <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('assets')}}/images/post-36.jpg" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    Boss revokes employee's WFH status, threatens to fire them
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    Punjab
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    Jul 22, 2023
                                                </span>
                                            </span>
                                        </div>
                                        <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('assets')}}/images/post-37.jpg" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-lg-4">
                <div class="p-b-20">
                    <div class="p-b-30">
                        <div class="how2 how2-cl5 mb-4 flex-s-c bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                Entertainment
                            </h3>
                        </div>
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <div class="p-b-10">
                                            <h5 class="p-b-5">
                                                <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    Ashok Gehlot slams PM for calling Manipur 'his govt' in 'few secs' of speech
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <span class="f1-s-3">
                                                    Jul 22, 2023
                                                </span>
                                            </span>
                                        </div>
                                        <a href="javascript:void();" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('assets')}}/images/post-36.jpg" alt="IMG" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        ED arrests woman IAS officer Ranu Sahu in alleged coal levy case in Chandigarh
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <span class="f1-s-3">
                                                        Jul 22, 2023
                                                    </span>
                                                </span>
                                            </div>
                                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{asset('assets')}}/images/post-01.jpg" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        ED arrests woman IAS officer Ranu Sahu in alleged coal levy case in Chandigarh
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <span class="f1-s-3">
                                                        Jul 22, 2023
                                                    </span>
                                                </span>
                                            </div>
                                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{asset('assets')}}/images/post-06.jpg" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        ED arrests woman IAS officer Ranu Sahu in alleged coal levy case in Chandigarh
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <span class="f1-s-3">
                                                        Jul 22, 2023
                                                    </span>
                                                </span>
                                            </div>
                                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{asset('assets')}}/images/post-03.jpg" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        ED arrests woman IAS officer Ranu Sahu in alleged coal levy case in Chandigarh
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <span class="f1-s-3">
                                                        Jul 22, 2023
                                                    </span>
                                                </span>
                                            </div>
                                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{asset('assets')}}/images/post-04.jpg" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 mt-4 text-center">
                                    <a href="javascript:void();" class="btn btn-primary px-5">View All</a>
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
        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2">Advertisement</p>
                <a href="javascript:void()">
                    <img src="{{asset('assets')}}/images/ads/ad4.jpg" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
<section class="p-t-50">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 p-b-25">
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        National
                    </h3>
                    <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                        View all
                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                    </a>
                </div>
                <!-- Main Item post -->
                <div class="mb-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <a href="javascript:void();" class="wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets')}}/images/post-10.jpg" alt="IMG" class="img-fluid rounded">
                            </a>
                            <div class="p-t-20">
                                <h5 class="p-b-5">
                                    <a href="javascript:void();" class="f1-s-5 cl2 hov-cl10 trans-03">
                                        American live music lorem ipsum dolor sit amet consectetur
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        National
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        Jul 22, 2023
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        Boss revokes employee's WFH status, threatens to fire them
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        Punjab
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        Jul 22, 2023
                                    </span>
                                </span>
                            </div>
                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets')}}/images/post-11.jpg" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        Boss revokes employee's WFH status, threatens to fire them
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        Punjab
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        Jul 22, 2023
                                    </span>
                                </span>
                            </div>
                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets')}}/images/post-12.jpg" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        Boss revokes employee's WFH status, threatens to fire them
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        Punjab
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        Jul 22, 2023
                                    </span>
                                </span>
                            </div>
                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets')}}/images/post-38.jpg" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-b-25">
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        World
                    </h3>
                    <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                        View all
                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                    </a>
                </div>
                <!-- Main Item post -->
                <div class="mb-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <a href="javascript:void();" class="wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets')}}/images/post-34.jpg" alt="IMG" class="img-fluid rounded">
                            </a>
                            <div class="p-t-20">
                                <h5 class="p-b-5">
                                    <a href="javascript:void();" class="f1-s-5 cl2 hov-cl10 trans-03">
                                        American live music lorem ipsum dolor sit amet consectetur
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        National
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        Jul 22, 2023
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        Boss revokes employee's WFH status, threatens to fire them
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        Punjab
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        Jul 22, 2023
                                    </span>
                                </span>
                            </div>
                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets')}}/images/post-35.jpg" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        Boss revokes employee's WFH status, threatens to fire them
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        Punjab
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        Jul 22, 2023
                                    </span>
                                </span>
                            </div>
                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets')}}/images/post-36.jpg" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        Boss revokes employee's WFH status, threatens to fire them
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        Punjab
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        Jul 22, 2023
                                    </span>
                                </span>
                            </div>
                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets')}}/images/post-37.jpg" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-b-25">
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        Sports
                    </h3>
                    <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                        View all
                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                    </a>
                </div>
                <!-- Main Item post -->
                <div class="mb-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <a href="javascript:void();" class="wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets')}}/images/post-40.jpg" alt="IMG" class="img-fluid rounded">
                            </a>
                            <div class="p-t-20">
                                <h5 class="p-b-5">
                                    <a href="javascript:void();" class="f1-s-5 cl2 hov-cl10 trans-03">
                                        American live music lorem ipsum dolor sit amet consectetur
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        National
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        Jul 22, 2023
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        Boss revokes employee's WFH status, threatens to fire them
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        Punjab
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        Jul 22, 2023
                                    </span>
                                </span>
                            </div>
                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets')}}/images/post-35.jpg" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        Boss revokes employee's WFH status, threatens to fire them
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        Punjab
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        Jul 22, 2023
                                    </span>
                                </span>
                            </div>
                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets')}}/images/post-36.jpg" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        Boss revokes employee's WFH status, threatens to fire them
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        Punjab
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        Jul 22, 2023
                                    </span>
                                </span>
                            </div>
                            <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets')}}/images/post-37.jpg" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop