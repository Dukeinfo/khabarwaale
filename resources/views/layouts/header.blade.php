        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <div class="topbar">
                <div class="content-topbar container h-100">
                    <div class="left-topbar">
                        {{-- <select class="form-select changeLang">
                            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                            <option value="hi" {{ session()->get('locale') == '	hi' ? 'selected' : '' }}>Hindi</option>
                            <option value="pa" {{ session()->get('locale') == 'pa' ? 'selected' : '' }}>Punjabi</option>
                            <option value="ur" {{ session()->get('locale') == 'ur' ? 'selected' : '' }}>Urdu</option>
                
                            <option value="gu" {{ session()->get('locale') == 'gu' ? 'selected' : '' }}>Gujarati</option>

                        </select> --}}
                        <a href="{{ route('english.language') }}" class="left-topbar-item btn btn-primary">
                            English 
                        </a>
                        <a href="{{ route('hindi.language') }}" class="left-topbar-item btn btn-primary ml-2">
                            Hindi
                        </a>
                        <a href="{{ route('punjabi.language') }}" class="left-topbar-item btn btn-primary ml-2">
                            Punjabi
                        </a>
                        <a href="{{ route('urdu.language') }}" class="left-topbar-item btn btn-primary ml-2">
                            Urdu
                        </a>
                        <span class="left-topbar-item flex-wr-s-c">
                            <span class="mr-2">
                                 {{GoogleTranslate::trans('Chandigarh', app()->getLocale())}}
                            </span>
                            <img class="m-b-1 m-rl-8" src="{{asset('assets')}}/images/weather-icon.svg" alt="IMG" width="25">
                            <span>
                                HI 37° LO 21°
                            </span>
                        </span>
                        <a href="javascript:void()" class="left-topbar-item">
                       
                            {!! GoogleTranslate::trans(\Carbon\Carbon::now()->format('d  M, Y'), app()->getLocale()) ?? "NA" !!}

                        </a>
                        <a href="javascript:void()" class="left-topbar-item">
                             {{GoogleTranslate::trans("Editor's Desk", app()->getLocale())}}
                        </a>
                        <a href="javascript:void()" class="left-topbar-item">
                             {{GoogleTranslate::trans("Archive", app()->getLocale())}}
                              
                        </a>
                    </div>
                    <div class="right-topbar">
                        <a href="javascript:void()">
                            <span class="fab fa-facebook-f"></span>
                        </a>
                        <a href="javascript:void()">
                            <span class="fab fa-instagram"></span>
                        </a>
                        <a href="javascript:void()">
                            <span class="fab fa-twitter"></span>
                        </a>
                        <a href="javascript:void()">
                            <span class="fab fa-linkedin-in"></span>
                        </a>
                        <a href="javascript:void()">
                            <span class="fab fa-youtube"></span>
                        </a>
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
                        <a href="{{ route('hindi.language') }}" class="left-topbar-item btn btn-primary ml-2">
                            Hindi
                        </a>
                        <a href="{{ route('punjabi.language') }}" class="left-topbar-item btn btn-primary ml-2">
                            Punjabi
                        </a>
                        <a href="{{ route('urdu.language') }}" class="left-topbar-item btn btn-primary ml-2">
                            Urdu
                        </a>
                        <span class="left-topbar-item flex-wr-s-c">
                            <span class="mr-2">
                                Chandigarh
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
                    <li  >
                        <a href="{{url('/category')}}">
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
                    @empty

                    @endforelse
                </ul>
            </div>
            <!--  -->
            <div class="wrap-logo no-banner container">
                <!-- Logo desktop -->
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{asset('assets')}}/images/logo.png" alt="LOGO"></a>
                </div>
            </div>
            <!-- Desktop -->
            <div class="wrap-main-nav">
                <div class="main-nav">
                    <!-- Menu desktop -->
                    <nav class="menu-desktop">
                        <a class="logo-stick" href="{{url('/')}}">
                            <img src="{{asset('assets')}}/images/logo.png" alt="LOGO">
                        </a>
                        <ul class="main-menu justify-content-center">
                            <li class="main-menu-active">
                                <a href="{{route('home.homepage')}}">
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
                            </li>
                            @forelse ($getMenus as $key => $menu )
                         
                            <li>
                                <a href="{{route('home.category', ['id' => $menu->id, 'slug' => createSlug($menu->category_en)])}}">
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
                            @empty

                            @endforelse
                         
        
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        