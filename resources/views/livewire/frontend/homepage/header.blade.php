
<div class="container-menu-desktop">
    <div class="topbar">
        <div class="content-topbar container h-100">
            <div class="left-topbar">
     
                <a href="{{ route('english.language') }}" class="left-topbar-item btn btn-primary">
                    English 
                </a>
  
                <a href="{{ route('punjabi.language') }}" class="left-topbar-item btn btn-primary ml-2">
                    Punjabi
                </a>
         
                <span class="left-topbar-item flex-wr-s-c">
                    <span class="mr-2">
                      @if (session()->get('language') === 'hindi')
                             चंडीगढ़ 
                      @elseif (session()->get('language') === 'english')
                         Chandigarh
                      @elseif (session()->get('language') === 'punjabi')
                            ਚੰਡੀਗੜ੍ਹ
                      @elseif (session()->get('language') === 'urdu')
                            چندی گڑھ
                      @endif
                    </span>
                    <img class="m-b-1 m-rl-8" src="{{asset('assets')}}/images/weather-icon.svg" alt="IMG" width="25">
                    <span>
                        HI 37° LO 21°
                    </span>
                </span>
                <a href="javascript:void()" class="left-topbar-item">
               
                    {!!  Carbon\Carbon::now()->format('d  M, Y') ?? "NA" !!}

                </a>
                <a href="javascript:void()" class="left-topbar-item">
                    @if (session()->get('language') === 'hindi')
                          संपादक डेस्क
                    @elseif (session()->get('language') === 'english')
                        Editor's Desk
                    @elseif (session()->get('language') === 'punjabi')
                            ਸੰਪਾਦਕ ਦਾ ਡੈਸਕ
                    @elseif (session()->get('language') === 'urdu')
                        ایڈیٹر کی میز
                    @endif
                </a>
                <a href="javascript:void()" class="left-topbar-item">
                    @if (session()->get('language') === 'hindi')
                              पुरालेख
                    @elseif (session()->get('language') === 'english')
                            Archive
                    @elseif (session()->get('language') === 'punjabi')
                            ਪੁਰਾਲੇਖ
                    @elseif (session()->get('language') === 'urdu')
                            محفوظ شدہ دستاویزات
                    @endif
                </a>
            </div>
            @php
                  $getsocialApps = \App\Models\SocialApp::where('status' , 'Active')->get();
             @endphp

            <div class="right-topbar">
                @forelse ($getsocialApps  as $socialApps )
                <a href="{{$socialApps->link ?? '' }}" target="_blank" >
                    <span class="{{$socialApps->icon ?? '' }}"></span>
                </a> 
                @empty
                    
                @endforelse
                {{-- <a href="javascript:void()">
                    <span class="fab fa-instagram"></span>
                </a>  --}}

            </div>
        </div>
    </div>
    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="{{url('/')}}"><img src="{{asset('assets/images/logo.png')}}" alt="IMG-LOGO"></a>
        </div>
        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li class="left-topbar">
                <a href="{{ route('english.language') }}" class="left-topbar-item btn btn-primary">
                    English 
                </a>
                {{-- <a href="{{ route('hindi.language') }}" class="left-topbar-item btn btn-primary ml-2">
                    Hindi
                </a> --}}
                <a href="{{ route('punjabi.language') }}" class="left-topbar-item btn btn-primary ml-2">
                    Punjabi
                </a>
                {{-- <a href="{{ route('urdu.language') }}" class="left-topbar-item btn btn-primary ml-2">
                    Urdu
                </a> --}}
                <span class="left-topbar-item flex-wr-s-c">
                    <span class="mr-2">
                        @if (session()->get('language') === 'hindi')
                              चंडीगढ़ 
                        @elseif (session()->get('language') === 'english')
                            Chandigarh
                        @elseif (session()->get('language') === 'punjabi')
                            ਚੰਡੀਗੜ੍ਹ
                        @elseif (session()->get('language') === 'urdu')
                            چندی گڑھ
                        @endif
                    </span>
                    <img class="m-b-1 m-rl-8" src="{{asset('assets')}}/images/weather-icon.svg" alt="IMG" width="25">
                    <span>
                        HI 37° LO 21°
                    </span>
                </span>
            </li>
        </ul>
        <ul class="main-menu-m">
            @forelse ($getMenus as $key => $menu )
                @if($menu->sort_id == 1) 
                <li class="main-menu-active">
                    <a href="{{url('/')}}" >
                        @if (session()->get('language') == "hindi" )
                        {{ $menu->category_hin ?? "NA" }}
                        @endif
                        @if (session()->get('language') == "english" )
                        {{ $menu->category_en ?? "NA" }}
                        @endif
                        @if (session()->get('language') == "punjabi" )
                        {{ $menu->category_pbi ?? "NA" }}
                        @endif
                        @if (session()->get('language') == "urdu" )
                        {{ $menu->category_urdu ?? "NA" }}
                        @endif
                        
                    </a>
                </li>
            @else
                <li>
                    <a  href="{{ route('home.category', ['id' => $menu->id, 'slug' => createSlug($menu->category_en)  ])}}">
                        @switch(session()->get('language'))
                        @case('hindi')
                            {{ $menu->category_hin ?? "NA" }}
                            @break
                        @case('punjabi')
                            {{ $menu->category_pbi ?? "NA" }}
                            @break
                        @case('urdu')
                            {{ $menu->category_urdu ?? "NA" }}
                            @break
                        @case('english')
                        {{ $menu->category_en ?? "NA" }}
                        @break
                        @default
                            {{ $menu->category_en ?? "NA" }}
                        @endswitch
                
                    </a>
                </li>
            @endif
            @empty

            @endforelse
            <li>
                <a href="{{route('home.video-gallery')}}" > 
                    @if (session()->get('language') === 'hindi')
                             वीडियो
                    @elseif (session()->get('language') === 'english')
                            Videos
                    @elseif (session()->get('language') === 'punjabi')
                            ਵੀਡੀਓਜ਼
                    @elseif (session()->get('language') === 'urdu')
                                ویڈیوز
                    @else   
                    @endif
                </a>
            </li>
        </ul>
    </div>
    <!--  -->
    <div class="wrap-logo no-banner container">
        <!-- Logo desktop -->
        <div class="logo">
            <a href="{{url('/')}}" ><img src="{{asset('assets/images/logo.png')}}" alt="LOGO"></a>
        </div>
    </div>
    <!-- Desktop -->
    <div class="wrap-main-nav">
        <div class="main-nav">
            <!-- Menu desktop -->
            <nav class="menu-desktop">
                <a class="logo-stick" href="{{url('/')}}" >
                    <img src="{{asset('assets/images/logo.png')}}" alt="LOGO">
                </a>
                <ul class="main-menu justify-content-center">
                    
                    @forelse ($getMenus as $key => $menu )
                        @if($menu->sort_id == 1) 
                            <li class="main-menu-active">
                                <a href="{{url('/')}}" >
                                    @if (session()->get('language') == "hindi" )
                                    {{ $menu->category_hin ?? "NA" }}
                                    @endif
                                    @if (session()->get('language') == "english" )
                                    {{ $menu->category_en ?? "NA" }}
                                    @endif
                                    @if (session()->get('language') == "punjabi" )
                                    {{ $menu->category_pbi ?? "NA" }}
                                    @endif
                                    @if (session()->get('language') == "urdu" )
                                    {{ $menu->category_urdu ?? "NA" }}
                                    @endif
                                    
                                </a>
                            </li>
                         @else
                            <li>
                                <a  href="{{ route('home.category', ['id' => $menu->id, 'slug' => createSlug($menu->category_en)  ])}}">
                                    @switch(session()->get('language'))
                                    @case('hindi')
                                        {{ $menu->category_hin ?? "NA" }}
                                        @break
                                    @case('punjabi')
                                        {{ $menu->category_pbi ?? "NA" }}
                                        @break
                                    @case('urdu')
                                        {{ $menu->category_urdu ?? "NA" }}
                                        @break
                                    @case('english')
                                    {{ $menu->category_en ?? "NA" }}
                                    @break
                                    @default
                                        {{ $menu->category_en ?? "NA" }}
                                    @endswitch
                            
                                </a>
                            </li>
                        @endif
                    @empty
                    @endforelse
                            <li>
                                <a href="{{route('home.video-gallery')}}" > 
                                    @if (session()->get('language') === 'hindi')
                                            वीडियो
                                    @elseif (session()->get('language') === 'english')
                                            Videos
                                    @elseif (session()->get('language') === 'punjabi')
                                            ਵੀਡੀਓਜ਼
                                    @elseif (session()->get('language') === 'urdu')
                                                ویڈیوز
                                    @else   
                                    @endif
                                </a>
                            </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
