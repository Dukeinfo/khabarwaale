<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}
    {{-- google --}}
    <meta name="google-site-verification" content="DhqXkLgsZA08lmkms8yHxN2nZn9GOvz4hSVV8NPp3EM" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-964426815"></script> 
    <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-964426815'); 
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118451473-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-118451473-1');
    </script>
        @php
            $headerSnippets = App\Models\SeoHeadersnippet::where('status' ,'Active')->whereNull('deleted_at')->get();
        @endphp
        @forelse($headerSnippets as $snippet)
             {!! $snippet->description !!}
        @empty
        @endforelse
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
    @livewire('frontend.homepage.home-top-add')

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

@php
    $footerSnippets = App\Models\SeoFootersnippet::where('status' ,'Active')->whereNull('deleted_at')->get();
@endphp
    @forelse($footerSnippets as $snippet)
    <!-- {{ $snippet->title }} -->
    {!! $snippet->description !!}
    @empty
    @endforelse
    @livewireScripts

<style>
/* Custom CSS for modal background */
.modal {
    background-color: rgba(0, 0, 0, 0.50) !important; 
}

.modal-backdrop {
    background-color: rgba(0, 0, 0, 0.50) !important; 
    z-index: 1040; /* Make backdrop appear above the modal */
}

.modal-backdrop.in {
    opacity: 1 !important; 
}

</style>
    <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title">
                        @if (session()->get('language') == "hindi" )
                            Subscribe to Notifications
                        @elseif (session()->get('language') == "english" )
                            Subscribe to Notifications
                        @elseif (session()->get('language') == "punjabi" )
                            ਸੂਚਨਾਵਾਂ  ਲਈ ਸਬਸਕ੍ਰਾਈਬ ਕਰੋ 
                        @elseif (session()->get('language') == "urdu" )
                            Subscribe to Notifications
                        @endif
                    </h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light text-dark">
                    ਕੀ ਤੁਸੀਂ ਨਵੇਂ ਅੱਪਡੇਟਾਂ ਅਤੇ ਤਰੱਕੀਆਂ ਬਾਰੇ ਸੂਚਨਾਵਾਂ ਪ੍ਰਾਪਤ ਕਰਨਾ ਚਾਹੁੰਦੇ ਹੋ?
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">ਬੰਦ ਕਰੋ</button> --}}
                    <button type="button" class="btn btn-primary" id="subscribeBtn">ਸਬਸਕ੍ਰਾਈਬ ਕਰੋ</button>
                </div>
            </div>
        </div>
    </div>



{{-- new js added to show pop up and alert  --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    const vapidPublicKey = "{{env('VAPID_PUBLIC_KEY')}}";
    // Check if the browser supports service workers and notifications
    if ('serviceWorker' in navigator && 'Notification' in window) {
        navigator.serviceWorker.register("sw.js").then(() => {
            // Check if the user is already subscribed
            navigator.serviceWorker.ready.then((sw) => {
                sw.pushManager.getSubscription().then((subscription) => {
                    if (subscription === null) {
                        // User is not subscribed, prompt them to allow notifications
                        $('#subscribeModal').modal('show');
                    }
                });
            });
        }).catch((error) => {
            console.error('Service Worker registration failed:', error);
        });
    } else {
        console.error('Service Worker or Notification API is not supported.');
    }

    // Event listener for subscribe button inside the modal
    document.getElementById('subscribeBtn').addEventListener('click', function () {
        requestPermission();
        $('#subscribeModal').modal('hide');
    });

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
                        fetch("/api/push-subscribe", {
                            method: "post",
                            body: JSON.stringify(subscription)
                        })
                            .then(response => {
                                console.log('Push Subscription Response:', response);
                                return response.json();
                            })
                            .then(data => {
                                if (data.message) {
                                    // Show SweetAlert for success
                                    swal("Subscribed!", data.message, "success");
                                } else {
                                    console.warn('Unexpected response format:', data);
                                }
                            })
                            .catch(error => {
                                console.error('Error subscribing to push notifications:', error);
                                swal("Error", "An error occurred. Please try again later.", "error");
                            });
                    });
                });
            }
        });
    }
</script>

</body>
</html>