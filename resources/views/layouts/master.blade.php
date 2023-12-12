<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="description" content="@yield('desc')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content=""> --}}
        {{-- @php
            $headerSnippets = App\Models\SeoHeadersnippet::get();
        @endphp
        @forelse($headerSnippets as $snippet)
                {{ $snippet->description }}
            @empty
        @endforelse --}}
    {!! SEO::generate() !!}
    @stack('social-scripts')
    <link rel="icon" type="image/png" href="{{asset('assets/images/icons/favicon.png')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animsition/css/animsition.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/util.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @livewireStyles

</head>

<body class="animsition">
    <header>
        @livewire('frontend.homepage.header')
    </header>
    @livewire('frontend.news-sections.flash-news')
  
    @yield('content')

    <footer>
        @include('layouts/footer')
    </footer>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <span class="fas fa-angle-up"></span>
        </span>
    </div>
    <!-- Modal Video 01-->
    @livewire('frontend.homepage.tv.live-tv')


    <script src="{{asset('assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/vendor/animsition/js/animsition.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    @livewireScripts

</body>
</html>