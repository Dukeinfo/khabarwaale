@extends('layouts.master')
@section('title', 'Khabarwaale - News Portal')
@section('desc', 'Khabarwaale - News Portal')
@section('keywords', 'Khabarwaale - News Portal')
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