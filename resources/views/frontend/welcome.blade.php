@extends('layouts.master')
@section('title', 'Khabarwaale - News Portal')
@section('desc', 'Khabarwaale - News Portal')
@section('keywords', 'Khabarwaale - News Portal')
@section('content')

<section class="bg-white">
    <div class="container">
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
                <span class="text-uppercase cl2 p-r-20">
                    <p class="breaking_tag"><i class="fa fa-circle"></i><span class="blink">{{GoogleTranslate::trans('Breaking News', app()->getLocale()) ?? "NA"}}</span></p>
                </span>
                <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
                    <span class="dis-inline-block slide100-txt-item animated visible-false">
                        <a href="javascript:void()" class="cl6">Smriti Irani versus Mahua Moitra over Cong's 'FAILED' report card on Manipur</a>
                    </span>
                    <span class="dis-inline-block slide100-txt-item animated visible-false">
                        <a href="javascript:void()" class="cl6">Rain turns Jodhpur roads into waterways. Man washed away with bike</a>
                    </span>
                    <span class="dis-inline-block slide100-txt-item animated visible-false">
                        <a href="javascript:void()" class="cl6">This scientist from Prayagraj was part of the team that launched Chandrayaan-3</a>
                    </span>
                </span>
            </div>
            <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
                <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        </div>
    </div>
</section>
<section class="p-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2"> {{GoogleTranslate::trans('Advertisement', app()->getLocale())}}</p>
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

                                {{GoogleTranslate::trans('Latest News', app()->getLocale())}}
                            </h3>
                        </div>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                {{--start  Latest News --}}
                                @forelse ($latestNewsData as $news )
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                
                                                <span class="text-danger mr-1"> 
                                                    {!!GoogleTranslate::trans($news['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}:
                                                </span>
                                                {!! GoogleTranslate::trans( Str::limit($news->title, 80), app()->getLocale()) !!}
                                               
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <span class="f1-s-3">
                                                {!! GoogleTranslate::trans( carbon\Carbon::parse($news->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                @empty
                                    
                                @endforelse
                             
                                {{--end Latest News --}}
                 

                                <div class="text-center">
                                    <a href="javascript:void()" class="btn btn-primary px-5">  {{GoogleTranslate::trans('View All', app()->getLocale())}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <div class="card bg-white shadow-sm text-center border-0">
                            <div class="card-body">
                                                {{GoogleTranslate::trans('Advertisement', app()->getLocale()) ?? "NA"}}
                                                <p class="text-uppercase text-center small pb-2"> </p>
                                <a href="javascript:void()">
                                    <img src="{{asset('assets/images/ads/v-ad1.gif')}}" class="img-fluid" alt="">
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
                      

                                {{GoogleTranslate::trans(' Top News ', app()->getLocale()) ?? "NA"}}

                            </h3>
                        </div>
                        {{-- start Top News --}}

                    @forelse ($topNewsData as  $key =>$topNews )
                        
                   @if($key == 0)
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="p-b-20">
                                    <h5 class="p-b-5">
                                        <a href="javascript:void();" class="f1-m-3 cl2 hov-cl10 trans-03 font-weight-bold">
                                        
                                           {!! GoogleTranslate::trans( Str::limit($topNews->title, 85), app()->getLocale()) !!}

                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        
                                            {!!GoogleTranslate::trans($topNews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}
                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            
                                            {!! GoogleTranslate::trans( carbon\Carbon::parse($topNews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}

                                        </span>
                                    </span>
                                </div>
                                <a href="javascript:void();" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ isset($topNews->image)? getNewsImage($topNews->image)  :  asset('assets/images/news/n1.jpg')}}" alt="IMG" class="img-fluid rounded">
                                </a>
                            </div>
                        </div>
                    @else 
                       
                        {{-- end Top News --}}

                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="flex-wr-sb-s">
                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                           {!! GoogleTranslate::trans( Str::limit($topNews->title, 80), app()->getLocale()) !!}

                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                {!!GoogleTranslate::trans($topNews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}

                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!! GoogleTranslate::trans( carbon\Carbon::parse($topNews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}

                                            </span>
                                        </span>
                                    </div>
                                    <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{ isset($topNews->image)? getNewsImage($topNews->image)  :  asset('assets/images/post-06.jpg')}}" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @empty
                        
                        @endforelse
                        {{-- end Top News --}}
       
                        <div class="text-center">
                            <p class="text-uppercase text-center small pb-2">{{GoogleTranslate::trans('Advertisement', app()->getLocale()) ?? "NA"}} </p>
                            <a href="javascript:void()">
                                <img src="{{asset('assets/images/ads/ad2.jpg')}}" class="img-fluid" alt="">
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
                                <p class="text-uppercase text-center small pb-2">
                                {{GoogleTranslate::trans('Advertisement', app()->getLocale()) ?? "NA"}}

                                </p>
                                <a href="javascript:void()">
                                    <img src="{{asset('assets')}}/images/ads/ad1.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <div class="card bg-white shadow-sm text-center border-0">
                            <div class="card-body">
                                <p class="text-uppercase text-center small pb-2">{{GoogleTranslate::trans('Advertisement', app()->getLocale()) ?? "NA"}}</p>
                                <a href="javascript:void()">
                                    <img src="{{asset('assets')}}/images/ads/ad2.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Editor's Desk -->
                    <div class="col-lg-12 mb-4">
                        <div class="how2 how2-cl5 flex-sb-c m-b-35 mb-3 bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                Editor's Desk
                            </h3>
                        </div>
                        <div class="card bg-white border-0">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <img src="{{asset('assets')}}/images/editor.png" class="mr-3" width="90" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0 text-dark font-weight-bold">Parminder Singh Jatpuri</h5>
                                        <p class="mb-3">Editor</p>
                                        <p>
                                            <a href="javascript:void()" class="btn btn-primary btn-sm px-3">Know More </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- Video -->
                        <div class="p-b-30">
                            <div class="position-relative">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{asset('assets')}}/images/video-01.jpg" alt="IMG">
                                    <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#modal-video-01">
                                        <span class="fab fa-youtube"></span>
                                    </button>
                                </div>
                                <div class="p-tb-16 p-rl-25 bg3">
                                    <h5 class="p-b-5">
                                        <a href="javascript:void()" class="f1-m-3 cl0 hov-cl10 trans-03">
                                            <span class="rippleSpan"></span> Watch LIVE TV
                                        </a>
                                    </h5>
                                    <span class="cl15">
                                        <span class="f1-s-3">
                                            Khabarwaale TV
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Stay Connected -->
                        <div class="p-b-30">
                            <div class="how2 how2-cl5 mb-4 flex-s-c bg-white">
                                <h3 class="f1-m-2 cl17 tab01-title">
                                    Stay Connected
                                </h3>
                            </div>
                            <ul class="bg-white p-4 shadow-sm rounded">
                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="javascript:void()" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>
                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            12.5K Followers
                                        </span>
                                        <a href="javascript:void()" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Like
                                        </a>
                                    </div>
                                </li>
                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="javascript:void()" class="size-a-8 flex-c-c borad-3 size-a-8 bg-dark fs-16 cl0 hov-cl0">
                                        <span class="fab fa-instagram"></span>
                                    </a>
                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            10K Followrs
                                        </span>
                                        <a href="javascript:void()" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Share
                                        </a>
                                    </div>
                                </li>
                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="javascript:void()" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            568 Followers
                                        </span>
                                        <a href="javascript:void()" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Follow
                                        </a>
                                    </div>
                                </li>
                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="javascript:void()" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                                        <span class="fab fa-youtube"></span>
                                    </a>
                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            5039 Subscribers
                                        </span>
                                        <a href="javascript:void()" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Subscribe
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2">{{GoogleTranslate::trans('Advertisement', app()->getLocale()) ?? "NA"}}</p>
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
                    @forelse ($getMenus  as $menu )
                        
                     @if($menu->sort_id == 1)


                        <div class="p-b-20">
                            <div class="how2 how2-cl5 mb-4 flex-sb-c bg-white">
                                <h3 class="f1-m-2 cl17 tab01-title">
                                    {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

                                </h3>
                                <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                
                              {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}
                                     
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
                    @endif
                    @empty
                        
                    @endforelse
                    <!-- Other -->
                    <div class="row">
                    @forelse ($getMenus  as $menu )
                @if($menu->sort_id == 2 )
                        <div class="col-sm-6 p-b-25">
                            <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                                <h3 class="f1-m-2 cl17 tab01-title">
                                    {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

                                </h3>
                                <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}

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
                        @endif
                @if($menu->sort_id == 3 )
                        <div class="col-sm-6 p-b-25">
                            <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                                <h3 class="f1-m-2 cl17 tab01-title">
                                    {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

                                </h3>
                                <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}

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
                        @endif
                        @empty
                        
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-lg-4">
                <div class="p-b-20">
                    @forelse ($getMenus  as $menu )
                    @if($menu->sort_id == 4 )
                    <div class="p-b-30">
                        <div class="how2 how2-cl5 mb-4 flex-s-c bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">

                              {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

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
                                    <a href="javascript:void();" class="btn btn-primary px-5">
                              {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}
                                        
                                       </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @empty
                    
                    @endforelse
                    <!-- Subscribe -->
                    <div class="bg10 p-rl-35 p-t-28 p-b-30 m-b-55">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2">{{GoogleTranslate::trans('Advertisement', app()->getLocale()) ?? "NA"}}</p>
                <a href="javascript:void()">
                    <img src="{{asset('assets/images/ads/ad4.jpg')}}" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
<section class="p-t-50">
    <div class="container">
        <div class="row">
            @forelse ($getMenus  as $menu )
            @if($menu->sort_id == 5 )
            <div class="col-sm-4 p-b-25">
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

                    </h3>
                    <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                        {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}

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
            @endif
            @empty
            
            @endforelse

            @forelse ($getMenus  as $menu )
            @if($menu->sort_id == 6 )
            <div class="col-sm-4 p-b-25">
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

                    </h3>
                    <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                        {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}

                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                    </a>
                </div>
                <!-- Main Item post -->
                <div class="mb-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <a href="javascript:void();" class="wrap-pic-w hov1 trans-03">
                                <img src="{{asset('assets/images/post-34.jpg')}}" alt="IMG" class="img-fluid rounded">
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
            @endif
            @empty
            
            @endforelse
            
            @forelse ($getMenus  as $menu )
            @if($menu->sort_id == 7 )
            <div class="col-sm-4 p-b-25">
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

                    </h3>
                    <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                        {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}

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
            @endif
            @empty
            
            @endforelse
        </div>
    </div>
</section>
@stop