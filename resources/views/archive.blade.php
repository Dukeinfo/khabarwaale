@extends('layouts.master')
@section('title', 'Khabarwaale - News Portal')
@section('desc', 'Khabarwaale - News Portal')
@section('keywords', 'Khabarwaale - News Portal')
@section('content')



<!-- Page heading -->
<div class="container p-t-30">
    <h2 class="f1-l-1 cl2 text-center">
        Punjab
    </h2>
</div>

<!-- Breadcrumb -->
<div class="container">
    <div class="flex-wr-sb-c justify-content-center p-tb-10">
        <div class="f2-s-1 m-tb-6">
            <a href="{{url('/')}}" class="breadcrumb-item f1-s-3 cl9">
                @switch(session()->get('language'))
                @case('hindi')
                        {!! 'होम '!!}
                @break
                @case('punjabi')
                        {!! 'ਹੋਮ '!!}    
                @break
                @case('urdu')
                        {!! 'گھر '!!}
                 
                @break
                @case('english')
                        Home
                @break
                @default
                        Home
                @endswitch
            </a>
            <a href="{{url('/category')}}" class="breadcrumb-item f1-s-3 cl9">
                Category
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
                Punjab
            </span>
        </div>
    </div>
</div>




<section class="p-t-30">
    <div class="container">
        <div class="row m-rl--1">
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
                     
                       
                        
                   
                                <div class="text-center">
                                    <a href="javascript:void()" class="btn btn-primary px-5">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-12 mb-4">
                        <div class="card bg-white shadow-sm text-center border-0">
                            <div class="card-body">
                                <p class="text-uppercase text-center small pb-2">Advertisement</p>
                                <a href="javascript:void()">
                                    <img src="{{asset('assets')}}/images/ads/v-ad1.gif" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                Punjab
                            </h3>
                        </div>
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="p-b-20">
                                    <h5 class="p-b-5">
                                        <a href="{{url('/inner')}}" class="f1-m-3 cl2 hov-cl10 trans-03 font-weight-bold">
                                            Ashok Gehlot slams PM for calling Manipur 'his govt' in 'few secs' of speech
                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a href="{{url('/category')}}" class="f1-s-4 cl10 hov-cl10 trans-03">
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
                                <a href="{{url('/inner')}}" class="wrap-pic-w hov1 trans-03">
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
                        {{-- <div class="text-center my-5">
                            <p class="text-uppercase text-center small pb-2">Advertisement</p>
                            <a href="javascript:void()">
                                <img src="{{asset('assets')}}/images/ads/ad2.jpg" class="img-fluid" alt="">
                            </a>
                        </div> --}}
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
                                        <img src="{{asset('assets')}}/images/post-01.jpg" alt="" class="img-fluid rounded">
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
                                        <img src="{{asset('assets')}}/images/post-02.jpg" alt="" class="img-fluid rounded">
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
                                        <img src="{{asset('assets')}}/images/post-03.jpg" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- Pagination -->
                <div class="flex-wr-s-c m-rl--7 p-t-15 p-b-30 justify-content-center">
                    <a href="javascript:void()" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 pagi-active">1</a>
                    <a href="javascript:void()" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7">2</a>
                </div>
            </div>



            @livewire('frontend.category.categor-right-add')

        </div>
    </div>
</section>
@stop