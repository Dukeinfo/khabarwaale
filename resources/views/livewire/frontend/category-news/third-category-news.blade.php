
    {{-- Chandigarh  --}}
    <div class="col-sm-6 p-b-25">
        <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
            <h3 class="f1-m-2 cl17 tab01-title">
                    @if (session()->get('language') === 'hindi')
                                {{ $getMenus->category_hin  ?? "NA"}}
                    @elseif (session()->get('language') === 'english')
                                {{ $getMenus->category_en  ?? "NA"}}
                    @elseif (session()->get('language') === 'punjabi')
                                {{ $getMenus->category_pbi ?? "NA"}}
                    @elseif (session()->get('language') === 'urdu')
                                {{ $getMenus->category_urdu ?? "NA"}}
                    @else   
                                {{ $getMenus->category_en  ?? "NA"}}
                    @endif
            </h3>
            <a href="{{route('home.category', ['id' => $getMenus->id, 'slug' => createSlug($getMenus->category_en)  ])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                @if (session()->get('language') === 'hindi')
                         सभी को देखें
                    @elseif (session()->get('language') === 'english')
                            View All
                    @elseif (session()->get('language') === 'punjabi')
                            ਸਭ ਦੇਖੋ
                    @elseif (session()->get('language') === 'urdu')
                            سب دیکھیں     
                    @else   
                            View All
                    @endif
                <i class="fs-12 m-l-5 fa fa-caret-right"></i>
            </a>
        </div>
        <!-- Main Item post -->
                                    {{--=================== Hindi =================== --}}
            @if (session()->get('language') == "hindi" )
                @forelse ($thirdCatWiseHindiNews  as $key => $catHindiNews )
                    @if($key  == 0 )
                    
                        <div class="mb-3">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <a  target="_blank"  href="{{route('home.inner',['newsid' => $catHindiNews->id , 'slug' =>  $catHindiNews->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{  isset($catHindiNews->image)? getNewsImage($catHindiNews->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded">
                                    </a>
                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a  target="_blank"  href="{{route('home.inner',['newsid' => $catHindiNews->id , 'slug' =>  $catHindiNews->slug ])}}"class="f1-s-5 cl2 hov-cl10 trans-03">
                                                {!!  Str::limit($catHindiNews->title, 80) ?? "NA" !!}
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a   target="_blank"  href="{{ route('home.category', ['id' => $catHindiNews->getmenu->id, 'slug' => createSlug($catHindiNews->getmenu->category_en)  ])}}"  class="f1-s-4 cl10 hov-cl10 trans-03">
                                                {!!  $catHindiNews['getmenu']['category_hin'] ?? "NA"  !!}
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!! carbon\Carbon::parse($catHindiNews->post_date)->format('M d, Y') ?? "NA" !!}
    
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="flex-wr-sb-s">
                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a target="_blank"  href="{{route('home.inner',['newsid' => $catHindiNews->id , 'slug' =>  $catHindiNews->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                {!!  Str::limit($catHindiNews->title, 65) ?? "NA" !!}
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a target="_blank" href="{{ route('home.category', ['id' => $catHindiNews->getmenu->id, 'slug' => createSlug($catHindiNews->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                {!!  $catHindiNews['getmenu']['category_hin'] ?? "NA"  !!}
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!! carbon\Carbon::parse($catHindiNews->post_date)->format('M d, Y') ?? "NA" !!}
                                            </span>
                                        </span>
                                    </div>
                                    <a target="_blank"   href="{{route('home.inner',['newsid' => $catHindiNews->id , 'slug' =>  $catHindiNews->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{  isset($catHindiNews->thumbnail)? getThumbnail($catHindiNews->thumbnail)  : asset('assets/images/post-11.jpg')}}" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    
                @endforelse
            @endif
                                {{--=================== english =================== --}}
        @if (session()->get('language') == "english" )
            @forelse ($thirdCatWise_EngNews  as $key => $catEngNews )
                    @if($key  == 0 )
                    <div class="mb-3">
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <a  target="_blank"  href="{{route('home.inner',['newsid' => $catEngNews->id , 'slug' =>  $catEngNews->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{  isset($catEngNews->image)? getNewsImage($catEngNews->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded">
                                </a>
                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a  target="_blank"  href="{{route('home.inner',['newsid' => $catEngNews->id , 'slug' =>  $catEngNews->slug ])}}"class="f1-s-5 cl2 hov-cl10 trans-03">
                                            {!!  Str::limit($catEngNews->title, 80) ?? "NA" !!}
                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a   target="_blank"  href="{{ route('home.category', ['id' => $catEngNews->getmenu->id, 'slug' => createSlug($catEngNews->getmenu->category_en)  ])}}"  class="f1-s-4 cl10 hov-cl10 trans-03">
                                            {!!  $catEngNews['getmenu']['category_en'] ?? "NA"  !!}
                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            {!! carbon\Carbon::parse($catEngNews->post_date)->format('M d, Y') ?? "NA" !!}
    
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="flex-wr-sb-s">
                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a target="_blank"  href="{{route('home.inner',['newsid' => $catEngNews->id , 'slug' =>  $catEngNews->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            {!!  Str::limit($catEngNews->title, 65) ?? "NA" !!}
                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a target="_blank" href="{{ route('home.category', ['id' => $catEngNews->getmenu->id, 'slug' => createSlug($catEngNews->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            {!!  $catEngNews['getmenu']['category_en'] ?? "NA"  !!}
                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            {!! carbon\Carbon::parse($catEngNews->post_date)->format('M d, Y') ?? "NA" !!}
                                        </span>
                                    </span>
                                </div>
                                <a target="_blank"   href="{{route('home.inner',['newsid' => $catEngNews->id , 'slug' =>  $catEngNews->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{  isset($catEngNews->thumbnail)? getThumbnail($catEngNews->thumbnail)  : asset('assets/images/post-11.jpg')}}" alt="" class="img-fluid rounded">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                @empty
            @endforelse
        @endif
    
                                {{--=================== Punjabi  ===================--}}
        @if (session()->get('language') == "punjabi" )
            @forelse ($thirdCatWise_PbiNews  as $key => $catPbiNews )
                @if($key  == 0 )
        
                <div class="mb-3">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <a  target="_blank"  href="{{route('home.inner',['newsid' => $catPbiNews->id , 'slug' =>  $catPbiNews->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                <img src="{{  isset($catPbiNews->image)? getNewsImage($catPbiNews->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded">
                            </a>
                            <div class="p-t-20">
                                <h5 class="p-b-5">
                                    <a  target="_blank"  href="{{route('home.inner',['newsid' => $catPbiNews->id , 'slug' =>  $catPbiNews->slug ])}}"class="f1-s-5 cl2 hov-cl10 trans-03">
                                        {!!  Str::limit($catPbiNews->title, 80) ?? "NA" !!}
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a   target="_blank"  href="{{ route('home.category', ['id' => $catPbiNews->getmenu->id, 'slug' => createSlug($catPbiNews->getmenu->category_en)  ])}}"  class="f1-s-4 cl10 hov-cl10 trans-03">
                                        {!!  $catPbiNews['getmenu']['category_pbi'] ?? "NA"  !!}
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        {!! carbon\Carbon::parse($catPbiNews->post_date)->format('M d, Y') ?? "NA" !!}
    
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a target="_blank"  href="{{route('home.inner',['newsid' => $catPbiNews->id , 'slug' =>  $catPbiNews->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        {!!  Str::limit($catPbiNews->title, 65) ?? "NA" !!}
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a target="_blank" href="{{ route('home.category', ['id' => $catPbiNews->getmenu->id, 'slug' => createSlug($catPbiNews->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        {!!  $catPbiNews['getmenu']['category_pbi'] ?? "NA"  !!}
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        {!! carbon\Carbon::parse($catPbiNews->post_date)->format('M d, Y') ?? "NA" !!}
                                    </span>
                                </span>
                            </div>
                            <a target="_blank"   href="{{route('home.inner',['newsid' => $catPbiNews->id , 'slug' =>  $catPbiNews->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{  isset($catPbiNews->thumbnail)? getThumbnail($catPbiNews->thumbnail)  : asset('assets/images/post-11.jpg')}}" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @empty
            @endforelse
        @endif
                                {{--=================== Urdu  ===================--}}
        @if (session()->get('language') == "urdu" )
                @forelse ($thirdCatWise_UrduNews  as $key => $catUrduNews )
                    @if($key  == 0 )
        
                    <div class="mb-3">
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <a  target="_blank"  href="{{route('home.inner',['newsid' => $catUrduNews->id , 'slug' =>  $catUrduNews->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{  isset($catUrduNews->image)? getNewsImage($catUrduNews->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded">
                                </a>
                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a  target="_blank"  href="{{route('home.inner',['newsid' => $catUrduNews->id , 'slug' =>  $catUrduNews->slug ])}}"class="f1-s-5 cl2 hov-cl10 trans-03">
                                            {!!  Str::limit($catUrduNews->title, 80) ?? "NA" !!}
                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a   target="_blank"  href="{{ route('home.category', ['id' => $catUrduNews->getmenu->id, 'slug' => createSlug($catUrduNews->getmenu->category_en)  ])}}"  class="f1-s-4 cl10 hov-cl10 trans-03">
                                            {!!  $catUrduNews['getmenu']['category_urdu'] ?? "NA"  !!}
                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            {!! carbon\Carbon::parse($catUrduNews->post_date)->format('M d, Y') ?? "NA" !!}
    
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a target="_blank"  href="{{route('home.inner',['newsid' => $catUrduNews->id , 'slug' =>  $catUrduNews->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        {!!  Str::limit($catUrduNews->title, 65) ?? "NA" !!}
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a target="_blank" href="{{ route('home.category', ['id' => $catUrduNews->getmenu->id, 'slug' => createSlug($catUrduNews->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        {!!  $catUrduNews['getmenu']['category_urdu'] ?? "NA"  !!}
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        {!! carbon\Carbon::parse($catUrduNews->post_date)->format('M d, Y') ?? "NA" !!}
                                    </span>
                                </span>
                            </div>
                            <a target="_blank"   href="{{route('home.inner',['newsid' => $catUrduNews->id , 'slug' =>  $catUrduNews->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{  isset($catUrduNews->thumbnail)? getThumbnail($catUrduNews->thumbnail)  : asset('assets/images/post-11.jpg')}}" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @empty
            @endforelse
        @endif
    </div>
    
    