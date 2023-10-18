<div>


        <section class="p-t-30 p-b-40">
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
                            @endswitch </p>
                        <a href="">
                            <img src="{{  asset('assets/images/ads/h-ad1.png')}}" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>





<section class="p-b-70 p-t-10">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-30">
                
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div>
                            <div class="flex-wr-sb-c p-tb-10">
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

                                    <a  target="_blank"  href="{{route('home.category', ['id' => $GetNewsDetail->getmenu->id, 'slug' =>  GoogleTranslate::trans(createSlug($GetNewsDetail->getmenu->category_en, app()->getLocale()) )])}}
                                    " class="breadcrumb-item f1-s-3 cl9">
                                

                                        @if (session()->get('language') === 'hindi')
                                                  {{ $GetNewsDetail->category_hin  ?? "NA"}}
                                        @elseif (session()->get('language') === 'english')
                                                    {{ $GetNewsDetail->category_en  ?? "NA"}}
                                        @elseif (session()->get('language') === 'punjabi')
                                                    {{ $GetNewsDetail->category_pbi ?? "NA"}}
                                        @elseif (session()->get('language') === 'urdu')
                                                    {{ $GetNewsDetail->category_urdu ?? "NA"}}
                                        @else   
                                                    {{ $GetNewsDetail->category_en  ?? "NA"}}
                                        @endif

                                    </a>

                                    <span class="breadcrumb-item f1-s-3 cl9">
                                     {{Str::limit($GetNewsDetail->slug, 70)  ?? "NA"}}
                                        
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <!-- Blog Detail -->
                            <div class="p-b-70">
                                <h3 class="f1-l-3 cl2 p-b-16 respon2">
                                    @if (session()->get('language') === 'hindi')
                                        {{$GetNewsDetail->title   ?? "NA"}}
                                    @elseif (session()->get('language') === 'english')
                                        {{$GetNewsDetail->title   ?? "NA"}}
                                    @elseif (session()->get('language') === 'punjabi')
                                        {{$GetNewsDetail->title   ?? "NA"}}
                                    @elseif (session()->get('language') === 'urdu')
                                        {{$GetNewsDetail->title   ?? "NA"}}
                                    @else   
                                        {{$GetNewsDetail->title   ?? "NA"}}
                                    @endif
                                </h3>

                                <div class="flex-wr-s-s p-b-40">
                                    <span class="f1-s-3 cl8 m-r-15">
                                        <a target="_blank"  href="{{url('/')}}" class="f1-s-4 cl17 hov-cl10 trans-03">
                                            by 
                                            {{$GetNewsDetail->user->name  ?? "NA"}}

                                        </a>

                                        <span class="m-rl-3">-</span>

                                        <span>

                                            {!! carbon\Carbon::parse($GetNewsDetail->post_date)->format('M d, Y h:i A' ) ?? "NA" !!}
                                        </span>
                                    </span>
                                </div>

                                <div class="wrap-pic-max-w p-b-30">
                                    <img src="{{isset($GetNewsDetail->image)? getNewsImage($GetNewsDetail->image)  : asset('assets/images/blog-list-04.jpg')}}" class="rounded img-fluid" alt="IMG">
                                </div>

                                <p class="f1-s-13 cl6 p-b-25">
                                    {!! $GetNewsDetail->news_description ?? "NA"!!}
                                </p>



            

                                <!-- Tag -->
                                <div class="flex-s-s p-t-12 p-b-15">
                                    <span class="f1-s-12 cl5 m-r-8">
                                        Tags:
                                    </span>

                                    <div class="flex-wr-s-s size-w-0">
                                        <a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
                                            India News
                                        </a>

                                        <a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
                                            Congress
                                        </a>
                                    </div>
                                </div>

                                <!-- Share -->
                                <div class="flex-s-s">
                                    <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                        Share:
                                    </span>

                                    <div class="flex-wr-s-s size-w-0">
                                        <a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>

                                        <a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                            <i class="fab fa-twitter"></i>
                                        </a>

                                        <a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>

                                        <a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row justify-content-center p-t-40">
                    <div class="col-lg-12">
                        <div class="p-b-20">
                            <div class="p-b-20">
                                <div class="how2 how2-cl5 mb-4 flex-sb-c bg-white">
                                    <h3 class="f1-m-2 cl17 tab01-title">
                                        Recommended for You
                                    </h3>
                                </div>
                                <div class="row">
                                @forelse ($recmendNewsData  as  $recmendNews )
    

                                    <div class="col-sm-6">
                                        <!-- Item post -->
                                        <div class="m-b-30">
                                            <div class="card border-0 shadow-sm mb-3">
                                                <div class="card-body">
                                                    <a target="_blank" href="{{route('home.inner',['newsid' => $recmendNews->id , 'slug' =>  GoogleTranslate::trans($recmendNews->slug, app()->getLocale())  ])}}" class="wrap-pic-w hov1 trans-03">
                                                        <img src="{{ isset($recmendNews->image)? getNewsImage($recmendNews->image)  :  asset('assets/images/post-05.jpg')}}" alt="IMG" class="img-fluid rounded">
                                                    </a>
                                                    <div class="p-t-20">
                                                        <h5 class="p-b-5">
                                                            <a target="_blank" href="{{route('home.inner',['newsid' => $recmendNews->id , 'slug' =>  GoogleTranslate::trans($recmendNews->slug , app()->getLocale()) ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                                            
                                                                {!!  Str::limit($recmendNews->title, 70) ?? "NA" !!}
                                                            </a>
                                                        </h5>
                                                        <span class="cl8">
                                                            <a  target="_blank" href="{{route('home.category', ['id' => $recmendNews->getmenu->id, 'slug' =>  GoogleTranslate::trans(createSlug($recmendNews->getmenu->category_en), app()->getLocale()) ])}}
                                                                " class="f1-s-4 cl10 hov-cl10 trans-03">
                                                              


                                                     @if (session()->get('language') === 'hindi')
                                                        {!! $recmendNews['getmenu']['category_hin']  ?? "NA"  !!}
                                                      @elseif (session()->get('language') === 'english')
                                                        {!! $recmendNews['getmenu']['category_en']  ?? "NA"  !!}
                                                      @elseif (session()->get('language') === 'punjabi')
                                                        {!! $recmendNews['getmenu']['category_pbi']  ?? "NA"  !!}
                                                      @elseif (session()->get('language') === 'urdu')
                                                         {!! $recmendNews['getmenu']['category_urdu']  ?? "NA"  !!}
                                                      @else   
                                                          {{ $GetNewsDetail->category_en  ?? "NA"}}
                                                      @endif
                                                            </a>
                                                            <span class="f1-s-3 m-rl-3">
                                                                -
                                                            </span>
                                                            <span class="f1-s-3">
                                                                {!!   carbon\Carbon::parse($recmendNews->post_date)->format('M d, Y')  ?? "NA" !!}

                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
    
                                    @endforelse
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-md-10 col-lg-4 p-b-30">
                <div class="p-rl-0-sr991">
                    <div class="row">

                        <div class="col-lg-12 mb-4">
                            <div class="card bg-white shadow-sm text-center border-0">
                                <div class="card-body">
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
                                        @endswitch </p>
                                    <a href="javascript:void()">
                                        <img src="{{asset('assets')}}/images/ads/ad1.jpg" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="card bg-white shadow-sm text-center border-0">
                                <div class="card-body">
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
                                        @endswitch </p>
                                    <a href="javascript:void()">
                                        <img src="{{asset('assets')}}/images/ads/ad2.jpg" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Editor's Desk -->
                        <div class="col-lg-12 mb-4">
                            <div class="how2 how2-cl5 flex-sb-c m-b-35 mb-3 bg-white">
                                <h3 class="f1-m-2 cl17 tab01-title">
                                    Editor's Desk
                                </h3>
                            </div>
                            <div class="card bg-white border-0">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <img src="{{asset('assets')}}/images/editor.png" class="mr-3" width="90" alt="">
                                        <div class="media-body">
                                            <h5 class="mt-0 text-dark font-weight-bold">Parminder Singh Jatpuri</h5>
                                            <p class="mb-3">Editor</p>
                                            <p>
                                                <a href="javascript:void()" class="btn btn-primary btn-sm px-3">Know More </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <!-- Video -->
                            <div class="p-b-30">
                                <div class="position-relative">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{asset('assets')}}/images/video-01.jpg" alt="IMG">
                                        <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#modal-video-01">
                                            <span class="fab fa-youtube"></span>
                                        </button>
                                    </div>
                                    <div class="p-tb-16 p-rl-25 bg3">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void()" class="f1-m-3 cl0 hov-cl10 trans-03">
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
                            <div class="p-b-30">
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
                            </div>

                            <!-- Subscribe -->
                            <div class="bg10 p-rl-35 p-t-28 p-b-30 m-b-55">
                                <h5 class="f1-m-5 cl0 p-b-10">
                                    Subscribe
                                </h5>
                                <p class="f1-s-1 cl0 p-b-25">
                                    Get all latest content delivered to your email a few times a month.
                                </p>
                                <form class="size-a-9 pos-relative">
                                    <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="Email">
                                    <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Archive -->
                    <div class="p-b-37">
                        <div class="how2 how2-cl5 flex-s-c bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                Archive
                            </h3>
                        </div>

                        <ul class="p-t-32">
                            <li class="p-rl-4 p-b-19">
                                <a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                                    <span>
                                        July 2023
                                    </span>

                                    <span>
                                        (9)
                                    </span>
                                </a>
                            </li>

                            <li class="p-rl-4 p-b-19">
                                <a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                                    <span>
                                        June 2023
                                    </span>

                                    <span>
                                        (39)
                                    </span>
                                </a>
                            </li>

                            <li class="p-rl-4 p-b-19">
                                <a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                                    <span>
                                        May 2023
                                    </span>

                                    <span>
                                        (29)
                                    </span>
                                </a>
                            </li>

                            <li class="p-rl-4 p-b-19">
                                <a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                                    <span>
                                        April 2023
                                    </span>

                                    <span>
                                        (35)
                                    </span>
                                </a>
                            </li>

                            <li class="p-rl-4 p-b-19">
                                <a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                                    <span>
                                        March 2023
                                    </span>

                                    <span>
                                        (22)
                                    </span>
                                </a>
                            </li>

                            <li class="p-rl-4 p-b-19">
                                <a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                                    <span>
                                        February 2023
                                    </span>

                                    <span>
                                        (32)
                                    </span>
                                </a>
                            </li>

                            <li class="p-rl-4 p-b-19">
                                <a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                                    <span>
                                        January 2023
                                    </span>

                                    <span>
                                        (21)
                                    </span>
                                </a>
                            </li>

                            <li class="p-rl-4 p-b-19">
                                <a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                                    <span>
                                        December 2022
                                    </span>

                                    <span>
                                        (26)
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>


    </div>
</section>
</div>