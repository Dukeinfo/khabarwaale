@extends('layouts.master')
@php
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOTools;

$seoMetaData =  App\Models\SeoMetadetail::first();
        if($seoMetaData){
    // if($seoMetaData){    
    SEOTools::setTitle($seoMetaData->title ?? 'ਖਬਰਾਂ ਵਾਲੇ ');
    SEOTools::setDescription($seoMetaData->description ?? 'News Portal');
    SEOTools::opengraph()->setUrl(url()->current());
    SEOTools::setCanonical(url()->current());
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::twitter()->setSite($seoMetaData->title ?? 'ਖਬਰਾਂ ਵਾਲੇ');
    $keywords = $seoMetaData->keywords ?? 'ਖਬਰਾਂ ਵਾਲੇ';
    SEOMeta::addKeyword( $keywords);
       
    }
@endphp
@section('content')
<audio id="myAudio">
    <source src="{{ asset('tone/notification.mp3') }}" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>


<section class="p-t-30">
    <div class="container">
        <div class="row">
            @livewire('frontend.news-sections.latest-news' )
            <!-- main news -->
            <livewire:frontend.news-sections.top-news  />
            {{-- right side add and editor profile  --}}
            @livewire('frontend.advertisement.right-adds' ,['lazy' =>true])
        </div>
    </div>
</section>

 {{-- center add of home page  --}}
        @livewire('frontend.homepage.home-center-add')
<section class="p-t-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="p-b-20">
                    {{-- punjab  --}}
                    @livewire('frontend.category-news.first-category-news')
                    <!-- Other -->
                    <div class="row">
                        {{-- chandigarh  --}}
                    @livewire('frontend.category-news.second-category-news' )
                        {{-- haryana --}}
                    @livewire('frontend.category-news.third-category-news' )

                    </div>
                </div>
            </div>
                {{-- Enternainment  --}}
                    @livewire('frontend.category-news.side-forth-cat-news' ,['lazy' =>true])
        </div>
    </div>
</section>
        @livewire('frontend.homepage.home-bottom-add')

        @livewire('frontend.news-sections.bottom-news' ,['lazy' =>true])

 
@stop