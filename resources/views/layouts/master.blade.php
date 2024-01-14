<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    {{-- google --}}
    <meta name="google-site-verification" content="DhqXkLgsZA08lmkms8yHxN2nZn9GOvz4hSVV8NPp3EM" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-964426815"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-964426815'); </script><?php   include 'adminkh/admin/config/db-config.php'; ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118451473-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-118451473-1');
    </script>
    {{-- google --}}
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
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyBgtW8dn_KTd3sUVoOWoWE4fIPAwGHD5_A",
            authDomain: "newsportal-79da9.firebaseapp.com",
            projectId: "newsportal-79da9",
            storageBucket: "newsportal-79da9.appspot.com",
            messagingSenderId: "624416315926",
            appId: "1:624416315926:web:00e195743e164354dab337"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();
        function startFCM() {
            messaging
                .requestPermission()
                .then(function () {
                    return messaging.getToken()
                })
                .then(function (response) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route("store.token") }}',
                        type: 'POST',
                        data: {
                            token: response
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            alert('Subscribed Success');
                        },
                        error: function (error) {
                            alert(error);
                        },
                    });
                }).catch(function (error) {
                    alert(error);
                });
        }
        messaging.onMessage(function (payload) {
        const title = payload.notification.title;
        const body = payload.notification.body;
        const icon = payload.notification.icon;
        const news_url = payload.data.news_url;
        const options = {
            body: body,
            icon: icon,
            data: {
                url: news_url // Add the custom URL to the data field
            }
        };
            new Notification(title, options);
        });
    </script> --}}

        <script>
       
         const vapidPublicKey  =    "{{env('VAPID_PUBLIC_KEY')}}"
        //  window.onload = function() {
        //     // Check if permission is already granted
        //     if (Notification.permission === 'granted') {
        //         console.log('Notification permission already granted.');
        //     } else {
        //         // Call requestPermission function after the page has loaded
        //         requestPermission();
        //     }
        // };
        navigator.serviceWorker.register("sw.js");
    
        function requestPermission() {
            Notification.requestPermission().then((permission) => {
                if (permission === 'granted') {
                    // get service worker
                    navigator.serviceWorker.ready.then((sw) => {
                        // subscribe
                        sw.pushManager.subscribe({
                            userVisibleOnly: true,
                            applicationServerKey: vapidPublicKey
                        }).then((subscription) => {
                            // subscription successful
                            fetch("api/push-subscribe", {
                                method: "post",
                                body: JSON.stringify(subscription)
                            })
                            .then(response => {
                                console.log('Push Subscription Response:', response);
                                return response.json();
                            })

                            .then(data => {
                                if (data.message) {
                                    alert(data.message);
                                } else {
                                    // Handle other cases if needed
                                    console.warn('Unexpected response format:', data);
                                }
                            })
                            .catch(error => {
                                console.error('Error subscribing to push notifications:', error);
                                alert("An error occurred. Please try again later.");
                            });
                        });
                    });
                }
                
            });
        }
    </script>
</body>
</html>