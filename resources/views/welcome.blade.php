@extends('layouts.master')
@section('title', 'Khabarwaale - News Portal')
@section('desc', 'Khabarwaale - News Portal')
@section('keywords', 'Khabarwaale - News Portal')
@section('content')

@livewire('frontend.homepage.home-top-add')
<section class="p-t-30">
    <div class="container">
        <div class="row">
            @livewire('frontend.news-sections.latest-news' )
            <!-- main news -->
            <livewire:frontend.news-sections.top-news lazy />
            {{-- right side add and editor profile  --}}
            @livewire('frontend.advertisement.right-adds')

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
        @livewire('frontend.homepage.home-bottom-add')

        @livewire('frontend.news-sections.bottom-news')
@stop