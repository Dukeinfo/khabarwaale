@extends('layouts.master')
@section('title', 'Khabarwaale - News Portal')
@section('desc', 'Khabarwaale - News Portal')
@section('keywords', 'Khabarwaale - News Portal')
@section('content')

<section class="p-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2">          
                    @switch(session()->get('language'))
                    @case('hindi')
                        विज्ञापन
                        @break
                    @case('english')
                        Advertisement
                        @break
                    @case('punjabi')
                        ਇਸ਼ਤਿਹਾਰ
                        @break
                    @case('urdu')
                        اشتہار
                        @break
                    @default
                        Advertisement
                    @endswitch 
                </p>
                <a href="javascript:void()">
                    <img src="{{asset('assets/images/ads/h-ad1.png')}}" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
<section class="p-t-30">
    <div class="container">
        <div class="row">
            @livewire('frontend.news-sections.latest-news' )
            <!-- main news -->
            <livewire:frontend.news-sections.top-news lazy />
            {{-- right side add and editor profile  --}}
            @include('livewire.frontend.advertisement.right-adds')

        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2">
                    @switch(session()->get('language'))
                    @case('hindi')
                        विज्ञापन
                        @break
                    @case('english')
                        Advertisement
                        @break
                    @case('punjabi')
                        ਇਸ਼ਤਿਹਾਰ
                        @break
                    @case('urdu')
                        اشتہار
                        @break
                    @default
                        Advertisement
                    @endswitch 
                </p>
                <a href="javascript:void()">
                    <img src="{{asset('assets/images/ads/ad3.jpg')}}" class="img-fluid" alt="">
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
                    {{-- punjab  --}}
                    @livewire('frontend.category-news.first-category-news')
                    <!-- Other -->
                    <div class="row">
                        {{-- chandigarh  --}}
                    @livewire('frontend.category-news.second-category-news')
                        {{-- haryana --}}
                    @livewire('frontend.category-news.third-category-news')

                    </div>
                </div>
            </div>
                {{-- Enternainment  --}}
                    @livewire('frontend.category-news.side-forth-cat-news')
        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2">             
                    @switch(session()->get('language'))
                    @case('hindi')
                        विज्ञापन
                        @break
                    @case('english')
                        Advertisement
                        @break
                    @case('punjabi')
                        ਇਸ਼ਤਿਹਾਰ
                        @break
                    @case('urdu')
                        اشتہار
                        @break
                    @default
                        Advertisement
                    @endswitch 
                </p>
                <a href="javascript:void()">
                    <img src="{{asset('assets/images/ads/ad4.jpg')}}" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
        @livewire('frontend.news-sections.bottom-news')
@stop