
<div class="col-lg-12">
    <!-- Video -->

    <div class="p-b-30">
        <div class="position-relative">
            <div class="wrap-pic-w pos-relative">
                @if(isset($rightlivetvnews->video_url))
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{$rightlivetvnews->video_url}}?rel=0" frameborder="0" allowfullscreen></iframe>
                @else
                {{-- <img src="{{ isset($rightlivetvnews->video_image) ?  get_video_image($rightlivetvnews->video_image): asset('assets/images/video-01.jpg')}}" alt="IMG"> --}}
                <img src="{{ asset('assets/images/video-01.jpg')}}" alt="IMG" loading="lazy">
                @endif
                <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#modal-video-01">
                  
                </button>
            </div>
            <div class="p-tb-16 p-rl-25 bg3" data-toggle="modal" data-target="#modal-video-01">
                <h5 class="p-b-5">
                    <a href="javascript:void()" class="f1-m-3 cl0 hov-cl10 trans-03" >
                        <span class="rippleSpan"></span> Watch LIVE TV
                    </a>
                </h5>
                <span class="cl15">
                    <span class="f1-s-3">
                        Khabarwaale TV
                    </span>
                </span>
            </div>
        </div>
    </div>
    <!-- Stay Connected -->
    {{-- <div class="p-b-30">
        <div class="how2 how2-cl5 mb-4 flex-s-c bg-white">
            <h3 class="f1-m-2 cl17 tab01-title">
                Stay Connected
            </h3>
        </div>
        <ul class="bg-white p-4 shadow-sm rounded">
            <li class="flex-wr-sb-c p-b-20">
                <a href="javascript:void()" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                    <span class="fab fa-facebook-f"></span>
                </a>
                <div class="size-w-3 flex-wr-sb-c">
                    <span class="f1-s-8 cl3 p-r-20">
                        12.5K Followers
                    </span>
                    <a href="javascript:void()" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                        Like
                    </a>
                </div>
            </li>
            <li class="flex-wr-sb-c p-b-20">
                <a href="javascript:void()" class="size-a-8 flex-c-c borad-3 size-a-8 bg-dark fs-16 cl0 hov-cl0">
                    <span class="fab fa-instagram"></span>
                </a>
                <div class="size-w-3 flex-wr-sb-c">
                    <span class="f1-s-8 cl3 p-r-20">
                        10K Followrs
                    </span>
                    <a href="javascript:void()" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                        Share
                    </a>
                </div>
            </li>
            <li class="flex-wr-sb-c p-b-20">
                <a href="javascript:void()" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                    <span class="fab fa-twitter"></span>
                </a>
                <div class="size-w-3 flex-wr-sb-c">
                    <span class="f1-s-8 cl3 p-r-20">
                        568 Followers
                    </span>
                    <a href="javascript:void()" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                        Follow
                    </a>
                </div>
            </li>
            <li class="flex-wr-sb-c p-b-20">
                <a href="javascript:void()" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                    <span class="fab fa-youtube"></span>
                </a>
                <div class="size-w-3 flex-wr-sb-c">
                    <span class="f1-s-8 cl3 p-r-20">
                        5039 Subscribers
                    </span>
                    <a href="javascript:void()" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                        Subscribe
                    </a>
                </div>
            </li>
        </ul>
    </div> --}}

    <!-- Subscribe -->
    <div class="bg10 p-rl-35 p-t-28 p-b-30 m-b-55"  @if(request()->routeIs('home.homepage')) style="display: none" @endif>
        <h5 class="f1-m-5 cl0 p-b-10">
            Subscribe
        </h5>
        <p class="f1-s-1 cl0 p-b-25">
            Get all latest content delivered to your email a few times a month.
        </p>
        <form class="size-a-9 pos-relative"   wire:submit.prevent="subscribe">  
    
            @csrf
            <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" wire:model='email' name="email" placeholder="Email">
            @error('email')
            <div class="alert alert-danger">
                {{ $message}}</span>
            @enderror
            <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03" type="submit" wire:loading.attr="disabled" >
                <i class="fa fa-arrow-right"></i>
            </button>
        </form>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
       
        @elseif (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @else
        
        @endif


    </div>

</div>