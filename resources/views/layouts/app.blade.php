<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ 'Khabarwaale - News Portal' }}</title>
        @stack('ckscripts')
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('desc')">
        <meta name="keywords" content="@yield('keywords')">
        <meta name="author" content="">
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
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
       
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="animsition"  >
   
        <header>
          @livewire('frontend.homepage.header')
        </header>
        @livewire('frontend.news-sections.flash-news')

        {{ $slot }}
     

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
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>
            <div class="wrap-video-mo-01">
                <div class="video-mo-01">
                    <iframe src="https://www.youtube.com/embed/rMVarSeBOrI?rel=0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

        {{-- <x-banner />
            @auth
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            @endauth
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div> --}}

        

        <script src="{{asset('assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('assets/vendor/animsition/js/animsition.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        @stack('modals')

        @livewireScripts



    </body>
</html>
