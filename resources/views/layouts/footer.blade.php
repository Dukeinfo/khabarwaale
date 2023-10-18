<div class="bg2 p-t-40 p-b-25">
    <div class="container">
        <div class="row">
            @php
                
                $getFooteraddress = DB::table('contact_infos')->where('deleted_at',Null)->first();

            @endphp
            <div class="col-lg-4 p-b-20">
                <div class="size-h-3 flex-s-c">
                    <a href="{{url('/')}}">
                        <img class="max-s-full" src="{{ isset($getFooteraddress->footer_logo) ? asset('storage/' . $getFooteraddress->footer_logo) :  asset('assets/images/logo-white.png')}}" alt="LOGO">
                    </a>
                </div>
                <div>
                    <p class="f1-s-1 cl11 p-b-16">
                        @if($getFooteraddress->disclaimer)
                        
                        {!!  Str::limit($getFooteraddress->disclaimer, 150) !!}
                        <a href="javascript:void()" class="cl17">read more</a>
                        @else 
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor magna eget elit efficitur, at accumsan sem placerat. Nulla tellus libero, mattis nec molestie at, facilisis ut turpis. Vestibulum dolor metus, tincidunt eget odio...
                        <a href="javascript:void()" class="cl17">read more</a>
                        @endif

                    </p>
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                        @if (session()->get('language') === 'hindi')
                            {!! 'हम सामाजिक हैं, हमसे जुड़ें'!!}
                       @elseif (session()->get('language') === 'english')
                                We're social, connect with us
                        @elseif (session()->get('language') === 'punjabi')
                                {!! 'ਅਸੀਂ ਸਮਾਜਿਕ ਹਾਂ, ਸਾਡੇ ਨਾਲ ਜੁੜੋ'!!}
                       @elseif (session()->get('language') === 'urdu')
                                {!! 'ہم سماجی ہیں، ہمارے ساتھ جڑیں۔' !!}
                       @endif
                        </h5>
                    </div>
                    <div>
                        <a href="javascript:void()" class="fs-18 cl11 hov-cl10 trans-03 m-r-10">
                            <span class="fab fa-facebook-f social-element"></span>
                        </a>
                        <a href="javascript:void()" class="fs-18 cl11 hov-cl10 trans-03 m-r-10">
                            <span class="fab fa-twitter social-element"></span>
                        </a>
                        <a href="javascript:void()" class="fs-18 cl11 hov-cl10 trans-03 m-r-10">
                            <span class="fab fa-instagram social-element"></span>
                        </a>
                        <a href="javascript:void()" class="fs-18 cl11 hov-cl10 trans-03 m-r-10">
                            <span class="fab fa-linkedin-in social-element"></span>
                        </a>
                        <a href="javascript:void()" class="fs-18 cl11 hov-cl10 trans-03 m-r-10">
                            <span class="fab fa-youtube social-element"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-5 p-b-20">
                <div class="size-h-3 flex-s-c">
                    <h5 class="f1-m-7 cl0">
                            @if (session()->get('language') === 'hindi')
                                 जुड़ा हो
                            @elseif (session()->get('language') === 'english')
                                  Get Connected
                             @elseif (session()->get('language') === 'punjabi')
                                    ਜੁੜੋ
                            @elseif (session()->get('language') === 'urdu')
                                    جڑیں
                            @endif
                    </h5>
                </div>
                <address class="cl11">

                @if (session()->get('language') === 'hindi')
                <p class="mb-3"><i class="fa fa-map-marker-alt fa-fw mr-2"></i> 
                     सी-2, एससीओ 86-87, टीएफ, सेक्टर 45-सी, चंडीगढ़
                    </p>
               @elseif (session()->get('language') === 'english')
                    <p class="mb-3"><i class="fa fa-map-marker-alt fa-fw mr-2"></i> 
                        {!! $getFooteraddress->address ??  'C-2, SCO 86-87, TF, Sector 45-C, Chandigarh'!!}
                    </p>
                @elseif (session()->get('language') === 'punjabi')
                <p class="mb-3"><i class="fa fa-map-marker-alt fa-fw mr-2"></i> 

                     C-2, SCO 86-87, TF, ਸੈਕਟਰ 45-C, ਚੰਡੀਗੜ੍ਹ
                </p>
               @elseif (session()->get('language') === 'urdu')
               <p class="mb-3"><i class="fa fa-map-marker-alt fa-fw mr-2"></i> 

                     C-2، SCO 86-87، TF، سیکٹر 45-C، چندی گڑھ
               </p>                    
               @endif
                  
                    <p class="mb-3"><i class="fa fa-envelope fa-fw mr-2"></i> 
                        <a href="mailto:{!! $getFooteraddress->email ??  'newskhabarwaale@gmail.com'!!}" 
                         class="cl11 hov-cl10 trans-03"> {!! $getFooteraddress->email ??  'newskhabarwaale@gmail.com'!!}</a>
                    </p>
                    <p class="mb-3"><i class="fa fa-mobile-alt fa-fw mr-2"></i>
                        <a href="tel:{{ $getFooteraddress->phone ?? '+91-9815481679' }}" class="cl11 hov-cl10 trans-03">{{ $getFooteraddress->phone ?? '+91-9815481679' }}</a>

                        </p>
                    <p class="mb-3"><i class="fa fa-globe fa-fw mr-2"></i> 
                        <a href="{!! $getFooteraddress->website ??  'www.khabarwaale.com'!!}" 
                         class="cl11 hov-cl10 trans-03">{!! $getFooteraddress->website ??  'www.khabarwaale.com'!!}</a></p>
                </address>

                <div class="size-h-3 flex-s-c">
                    <h5 class="f1-m-7 cl0">
                        
                @if (session()->get('language') === 'hindi')
                        {!! 'हमारा ऐप डाउनलोड करें'!!}
                   @elseif (session()->get('language') === 'english')
                            Download Our App
                    @elseif (session()->get('language') === 'punjabi')
                            {!! 'ਸਾਡੀ ਐਪ ਡਾਊਨਲੋਡ ਕਰੋ'!!}
                   @elseif (session()->get('language') === 'urdu')
                            {!! 'ہماری ایپ ڈاؤن لوڈ کریں۔' !!}
                   @endif
                    </h5>
                </div>
                <div>
                    <a href="javascript:void();">
                        <img src="{{asset('assets')}}/images/app-logo.png" class="img-fluid" width="180" alt="">
                    </a>
                </div>

            </div>
            <div class="col-sm-6 col-lg-3 p-b-20">
                <div class="size-h-3 flex-s-c">
                    <h5 class="f1-m-7 cl0">
                        
                    @if (session()->get('language') === 'hindi')
                            {!! 'वर्ग'!!}
                   @elseif (session()->get('language') === 'english')
                            Category
                    @elseif (session()->get('language') === 'punjabi')
                            {!! 'ਸ਼੍ਰੇਣੀ'!!}
                   @elseif (session()->get('language') === 'urdu')
                            {!! 'قسم' !!}
                   @endif
                    </h5>
                </div>
                <ul class="m-t--12">

             @php
                 $getFooterMenus = DB::table('categories')->take(8)->get();
             @endphp

                @forelse ($getFooterMenus as $key => $menu )
                    @if($key == 0 )  
                    @continue
                    @endif
                    <li class="how-bor1 p-rl-5 p-tb-10">
                        <a href="{{ route('home.category', ['id' => $menu->id, 'slug' => createSlug($menu->category_en)]) }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
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
        </div>
    </div>
</div>
<div class="bg11">
    <div class="container size-h-4 p-tb-15">
        <div class="row">
            <div class="col-lg-4">
                <a href="javascript:void()" class="f1-s-1 cl10 hov-link1">
                    @if (session()->get('language') === 'hindi')
                        {!! 'हमारे बारे में'!!}
                    @elseif (session()->get('language') === 'english')
                            About Us
                    @elseif (session()->get('language') === 'punjabi')
                            {!! 'ਸਾਡੇ ਬਾਰੇ'!!}
                    @elseif (session()->get('language') === 'urdu')
                            {!! 'ہمارے بارے میں' !!}
                    @endif
                </a>
                <span>|</span>
                <a href="javascript:void()" class="f1-s-1 cl10 hov-link1">
                    @if (session()->get('language') === 'hindi')
                            {!! 'गोपनीयता नीति'!!}
                @elseif (session()->get('language') === 'english')
                            Privacy Policy
                    @elseif (session()->get('language') === 'punjabi')
                            {!! 'ਪਰਾਈਵੇਟ ਨੀਤੀ'!!}
                @elseif (session()->get('language') === 'urdu')
                            {!! 'رازداری کی پالیسی' !!}
                @endif
                </a>
            </div>
            <div class="col-lg-8">
                <span class="f1-s-1 cl0 txt-center">
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved
                    <a href="javascript:void()" class="f1-s-1 cl10 hov-link1">
                        Khabarwaale.com
                    </a>
                </span>
            </div>
        </div>

    </div>
</div>