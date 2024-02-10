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




{{-- @livewire('frontend.archive.view-archive-news' , ['id' => $id]) --}}
@stop