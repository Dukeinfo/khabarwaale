<div class="card border-0 shadow-sm">
    @push('social-scripts')
        <!-- Basic OG tags -->
        <meta property="og:url" content="{{url()->current()}}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $getNewsDetail->title }}" />
        <meta property="og:description" content="{{  strip_tags($getNewsDetail->news_description) ?? "NA" }}" />
        <meta property="og:image" content="{{ $getNewsDetail->image_url }}" />
        <meta property="og:image:width" content="1200"> <!-- Width of the image in pixels -->
        <meta property="og:image:height" content="630"> <!-- Height of the image in pixels -->
        <meta property="og:site_name" content="khabarwaale">
    @endpush
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

                    <a  target="_blank" href="{{route('home.category', ['id' => $menuId, 'slug' => createSlug($getNewsDetail['getmenu']['category_en'])  ])}}" class="breadcrumb-item f1-s-3 cl9">
                        @if (session()->get('language') === 'hindi')
                              {{$getNewsDetail['getmenu']['category_hin'] ?? "NA"}}
                        @elseif (session()->get('language') === 'english')
                             {{$getNewsDetail['getmenu']['category_en'] ?? "NA"}}
                        @elseif (session()->get('language') === 'punjabi')
                             {{$getNewsDetail['getmenu']['category_pbi'] ?? "NA"}}
                        @elseif (session()->get('language') === 'urdu')
                              {{$getNewsDetail['getmenu']['category_urdu'] ?? "NA"}}
                        @else   
                              {{$getNewsDetail['getmenu']['category_en'] ?? "NA"}}
                        @endif


                    </a>

                    <span class="breadcrumb-item f1-s-3 cl9">
                    
                        {!!Str::words($getNewsDetail->title, 10, '...') ?? "NA" !!}
                    </span>
                </div>
            </div>
        </div>
        <div class="">
            <!-- Blog Detail -->
            <div class="p-b-70">
                <h3 class="f1-l-3 cl2 p-b-16 respon2">
             
                    {!! Str::words($getNewsDetail->title, 25, '...') ?? "NA" !!}

                </h3>

                <div class="flex-wr-s-s p-b-40">
                    <span class="f1-s-3 cl8 m-r-15">
                        <a href="{{url('/')}}" class="f1-s-4 cl17 hov-cl10 trans-03">
                     
                            {{$getNewsDetail->user->name  ?? "NA"}}
                        </a>

                        <span class="m-rl-3">-</span>

                        <span>
                          
                            {!! carbon\Carbon::parse($getNewsDetail->post_date)->format('M d, Y h:i A' ) ?? "NA" !!}
                        </span>
                    </span>
                </div>

                <div class="wrap-pic-max-w p-b-30">
                    <img src="{{isset($getNewsDetail->image)? getNewsImage($getNewsDetail->image)  : asset('assets/images/blog-list-04.jpg')}}" class="rounded img-fluid" alt="IMG">
                </div>

                <p class="f1-s-13 cl6 p-b-25">
                    {!! $getNewsDetail->news_description ?? "NA"!!}
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
                    {{-- <link rel="stylesheet" href="{{ asset('css/share-buttons.css') }}"> --}}
                    {{-- <script src="{{ asset('js/share-buttons.js') }}"></script> --}}
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
                    <script src="{{ asset('js/share.js') }}"></script>
                

                <style>
                        /* Adjust the container */
                        div#social-links {
                            margin: 20px auto;
                            max-width: 500px;
                            /* Center the social links */
                        }
                        /* Adjust the container */
                        div#social-links {
                            margin: 20px 0;
                            max-width: 500px;
                            text-align: left; /* Align the social links to the left */
                        }

                        /* Style the list */
                        div#social-links ul {
                            padding: 0;
                            list-style: none;
                        }

                        /* Style the list items */
                        div#social-links ul li {
                            display: inline-block;
                            margin: 5px; /* Adjust spacing between items */
                        }

                        /* Style the links */
                        div#social-links ul li a {
                            display: block;
                            padding: 15px;
                            border: 2px solid #00aeef; /* Using the specified color */
                            border-radius: 50%; /* Make the links circular */
                            font-size: 24px;
                            color: #fff;
                            background-color: #00aeef; /* Using the specified color */
                            text-decoration: none;
                            transition: background-color 0.3s, color 0.3s;
                        }

                        /* Hover effect */
                        div#social-links ul li a:hover {
                            background-color: #fff;
                            color: #00aeef; /* Change to the specified color on hover */
                        }


                        /* Style the list */
                        div#social-links ul {
                            padding: 0;
                            list-style: none;
                        }

                        /* Style the list items */
                        div#social-links ul li {
                            display: inline-block;
                            margin: 5px; /* Adjust spacing between items */
                        }

                        /* Style the links */
                        div#social-links ul li a {
                            display: block;
                            padding: 15px;
                            border: 2px solid #00aeef; /* Using the specified color */
                            border-radius: 50%; /* Make the links circular */
                            font-size: 24px;
                            color: #fff;
                            background-color: #00aeef; /* Using the specified color */
                            text-decoration: none;
                            transition: background-color 0.3s, color 0.3s;
                        }

                        /* Hover effect */
                        div#social-links ul li a:hover {
                            background-color: #fff;
                            color: #00aeef; /* Change to the specified color on hover */
                        }


                </style>
                    
                    <div class="flex-wr-s-s size-w-0">
                        {!! $shareComponent !!}
                        {{-- <a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                            <i class="fab fa-facebook-f"></i>
                        </a> --}}
{{-- 
                        <a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                            <i class="fab fa-twitter"></i>
                        </a>

                        <a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                            <i class="fab fa-google-plus-g"></i>
                        </a>

                        <a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                            <i class="fab fa-pinterest-p"></i>
                        </a> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

