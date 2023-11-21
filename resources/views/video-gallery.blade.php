@extends('layouts.master')
@section('title', 'Khabarwaale - News Portal')
@section('desc', 'Khabarwaale - News Portal')
@section('keywords', 'Khabarwaale - News Portal')
@section('content')


<section class="p-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
           
             
                </div>
            </div>
            <!-- main news -->
           
        </div>
    </div>
</section>



<section class="p-t-50">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 p-b-25">
    
                <!-- Main Item post -->
                <div class="mb-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="p-b-30">
                                <div class="position-relative">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{  asset('assets/images/video-01.jpg')}}" alt="IMG">
                        
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
       
      
        </div>
    </div>
</section>
@stop