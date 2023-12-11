@extends('layouts.master')
@php
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOTools;

$seoMetaData =  App\Models\SeoMetadetail::first();
        if($seoMetaData){
    // if($seoMetaData){    
    SEOTools::setTitle($seoMetaData->title ?? 'video-gallery - Punjabi News Portal');
    SEOTools::setDescription($seoMetaData->description ?? 'News Portal');
    SEOTools::opengraph()->setUrl(url()->current());
    SEOTools::setCanonical(url()->current());
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::twitter()->setSite($seoMetaData->title ?? 'video-gallery - Punjabi News Portal');
    $keywords = $seoMetaData->keywords ?? 'video-gallery - Punjabi News Portal';
    SEOMeta::addKeyword( $keywords);
       
    }
@endphp
@section('content')


<div class="container p-t-30">
    <h2 class="f1-l-1 cl2 text-center">

    @if (session()->get('language') === 'hindi')
                वीडियो गैलरी
    @elseif (session()->get('language') === 'english')
            Video Gallery
       
    @elseif (session()->get('language') === 'punjabi')
                ਵੀਡੀਓ ਗੈਲਰੀ
    @elseif (session()->get('language') === 'urdu')
            ویڈیو گیلری
    @else   
    @endif
    </h2>
</div>



@livewire('frontend.videogallery.view-video-gallery')
@stop