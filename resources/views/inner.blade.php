@extends('layouts.master')
@section('title', 'Khabarwaale - News Portal')
@section('desc', 'Khabarwaale - News Portal')
@section('keywords', 'Khabarwaale - News Portal')
@section('content')



{{-- @livewire('frontend.innerpage.inner-page-top-add') --}}
{{-- @livewire('frontend.homepage.home-top-add') --}}


<section class="p-b-70 p-t-10">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-30">
              @livewire('frontend.innerpage.view-inner-page' ,['newsid' => $newsid ])

             @livewire('frontend.innerpage.inner-page-recommended' ,['newsid' => $newsid])

            </div>

            <!-- right Sidebar -->
            @livewire('frontend.innerpage.inner-page-right-add')
            
        </div>


    </div>
</section>


@stop