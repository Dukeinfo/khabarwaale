@extends('layouts.master')
@php
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOTools;

$seoMetaData =  App\Models\SeoMetadetail::first();
        if($seoMetaData){
    // if($seoMetaData){    
    SEOTools::setTitle($seoMetaData->title ?? 'Reporter-news - Punjabi News Portal ');
    SEOTools::setDescription($seoMetaData->description ?? 'News Portal');
    SEOTools::opengraph()->setUrl(url()->current());
    SEOTools::setCanonical(url()->current());
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::twitter()->setSite($seoMetaData->title ?? 'Reporter-news - Punjabi News Portal');
    $keywords = $seoMetaData->keywords ?? 'Reporter-news - Punjabi News Portal';
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
                    <img src="{{asset('assets'/images/ads/h-ad1.png)}}" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</section> --}}

<!-- Page heading -->
<div class="container p-t-30">
    <h2 class="f1-l-1 cl2 text-center">
      
        @switch(session()->get('language'))
        @case('hindi')
                {!! 'संपादक समाचार '!!}
        @break
        @case('punjabi')
                {!! 'ਸੰਪਾਦਕ ਖਬਰਾਂ '!!}    
        @break
        @case('urdu')
                {!! 'ایڈیٹر نیوز'!!}
         
        @break
        @case('english')
                Editor news
        @break
        @default
                Editor news
        @endswitch
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

     
        </div>
    </div>
</div>




<section class="p-t-30">
    <div class="container">
        <div class="row m-rl--1">

          @livewire('frontend.editor-news.view-latestnews')
          @livewire('frontend.editor-news.view-all-news')

            <div class="col-lg-4">
                <div class="row">

                    @forelse ($editorRightAdd as $advertisement)
                    <div class="col-lg-12 mb-4" >
                        <div class="card bg-white shadow-sm text-center border-0">
                            <div class="card-body">
                 
                                 @if(isset($advertisement->image))
                                <a href="{{$advertisement->link_add ?? "#"}}">
                                    <img src="{{  getAddImage($advertisement->image) }}" class="img-fluid" alt="">
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse


                    <!-- Editor's Desk -->
                    @livewire('frontend.advertisement.editor-profile')
                        <!-- Video -->
                        <!-- Subscribe -->
                    @livewire('frontend.homepage.subscribe.subscribe-form')
                   
                </div>
            </div>

        </div>
    </div>
</section>
@stop