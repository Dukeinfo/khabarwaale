<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
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
</head>

<body class="animsition">
    <header>
        @include('layouts/header')
    </header>
    <section class="bg-white">
        <div class="container">
            <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
                <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
                    <span class="text-uppercase cl2 p-r-20">
                        <p class="breaking_tag"><i class="fa fa-circle"></i><span class="blink">Breaking News</span></p>
                    </span>
                    <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
                        <span class="dis-inline-block slide100-txt-item animated visible-false">
                            <a href="javascript:void()" class="cl6">Smriti Irani versus Mahua Moitra over Cong's 'FAILED' report card on Manipur</a>
                        </span>
                        <span class="dis-inline-block slide100-txt-item animated visible-false">
                            <a href="javascript:void()" class="cl6">Rain turns Jodhpur roads into waterways. Man washed away with bike</a>
                        </span>
                        <span class="dis-inline-block slide100-txt-item animated visible-false">
                            <a href="javascript:void()" class="cl6">This scientist from Prayagraj was part of the team that launched Chandrayaan-3</a>
                        </span>
                    </span>
                </div>
                <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                    <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
                    <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

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
    <script src="{{asset('assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/vendor/animsition/js/animsition.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>