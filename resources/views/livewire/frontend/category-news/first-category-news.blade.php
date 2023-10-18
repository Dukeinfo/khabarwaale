

<div class="p-b-20">
    <div class="how2 how2-cl5 mb-4 flex-sb-c bg-white">
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
        <a   target="_blank"  href="{{route('home.category', ['id' => $getMenus->id, 'slug' => createSlug($getMenus->category_en)])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
        
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

    <div class="row" >
        {{-- ===================  English =================== --}}
    @if (session()->get('language') == "english" )
        @forelse ($catWiseEngNews as $index => $engcatwise )
                 @if( $index == 0 )
                    <div class="col-sm-6" >
                        <!-- Item post -->
                        <div class="m-b-30">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <a   target="_blank"  href="{{route('home.inner',['newsid' => $engcatwise->id , 'slug' =>  $engcatwise->slug ])}}" class="wrap-pic-w hov1 trans-03">

                                        <img src="{{ isset($engcatwise->image)? getNewsImage($engcatwise->image)  : asset('assets/images/post-05.jpg')}}" alt="IMG" class="img-fluid rounded">
                                    </a>
                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a  target="_blank"  href="{{route('home.inner',['newsid' => $engcatwise->id , 'slug' =>  $engcatwise->slug ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                            
                                                {!!  Str::limit($engcatwise->title, 85) ?? "NA" !!}
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $engcatwise->getmenu->id, 'slug' => createSlug($engcatwise->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                
                                                {!!  $engcatwise['getmenu']['category_en'] ?? "NA"  !!}
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!! carbon\Carbon::parse($engcatwise->post_date)->format('M d, Y') ?? "NA" !!}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 @else 
            @endif
        @empty
        @endforelse
        <div class="col-sm-6">
                @forelse ( $catWiseEngNews as $key =>  $engCatWise)
                        @if( $key > 0 )
                            <div class="card border-0 shadow-sm mb-3" >
                                <div class="card-body">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a  target="_blank"  href="{{route('home.inner',['newsid' => $engCatWise->id , 'slug' =>  $engCatWise->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {!! Str::limit($engCatWise->title, 65) ?? "NA" !!}

                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a  target="_blank"  href="{{route('home.category', ['id' => $engCatWise->getmenu->id, 'slug' => createSlug($engCatWise->getmenu->category_en)
                                                    ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    {!! $engCatWise['getmenu']['category_en'] ?? "NA"  !!}

                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {!!  carbon\Carbon::parse($engCatWise->post_date)->format('M d, Y') ?? "NA" !!}

                                                </span>
                                            </span>
                                        </div>
                                        <a   target="_blank"  href="{{route('home.inner',['newsid' => $engCatWise->id , 'slug' =>  $engCatWise->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{ isset($engCatWise->thumbnail)? getThumbnail($engCatWise->thumbnail)  : asset('assets/images/post-06.jpg')}}" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else 
                        @endif
                @empty
                @endforelse
        </div>
    @endif
        {{-- ===================  Hindi =================== --}}
     @if (session()->get('language') == "hindi" )
        @forelse ($catWiseHinNews as $index => $hindicatwise )
                 @if( $index == 0 )
                    <div class="col-sm-6" >
                        <!-- Item post -->
                        <div class="m-b-30">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <a   target="_blank"  href="javascript:void();" class="wrap-pic-w hov1 trans-03">

                                        <img src="{{ isset($hindicatwise->image)? getNewsImage($hindicatwise->image)  : asset('assets/images/post-05.jpg')}}" alt="IMG" class="img-fluid rounded">
                                    </a>
                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a  target="_blank"  href="{{route('home.inner',['newsid' => $hindicatwise->id , 'slug' => $hindicatwise->slug ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                            
                                                {!!  Str::limit($hindicatwise->title, 85) ?? "NA" !!}
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a  target="_blank"  href="{{route('home.category', ['id' => $hindicatwise->getmenu->id, 'slug' => createSlug($hindicatwise->getmenu->category_en)
                                                ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                
                                                {!!  $hindicatwise['getmenu']['category_hin'] ?? "NA"  !!}
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!! carbon\Carbon::parse($hindicatwise->post_date)->format('M d, Y') ?? "NA" !!}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 @else 
            @endif
        @empty
        @endforelse
        <div class="col-sm-6">
                @forelse ( $catWiseHinNews as $key =>  $catWise)
                        @if( $key > 0 )
                            <div class="card border-0 shadow-sm mb-3" >
                                <div class="card-body">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a  target="_blank"  href="{{route('home.inner',['newsid' => $catWise->id , 'slug' =>  $catWise->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {!! Str::limit($catWise->title, 65) ?? "NA" !!}

                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a  target="_blank"  href="{{route('home.category', ['id' => $catWise->getmenu->id, 'slug' => createSlug($catWise->getmenu->category_en)
                                                    ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    {!! $catWise['getmenu']['category_hin'] ?? "NA"  !!}

                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {!!  carbon\Carbon::parse($catWise->post_date)->format('M d, Y')  ?? "NA" !!}

                                                </span>
                                            </span>
                                        </div>
                                        <a   target="_blank"  href="{{route('home.inner',['newsid' => $catWise->id , 'slug' =>  $catWise->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{ isset($catWise->thumbnail)? getThumbnail($catWise->thumbnail)  : asset('assets/images/post-06.jpg')}}" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else 
                        @endif
                @empty
                @endforelse
        </div>
    @endif
        {{-- ===================  punjabi  =================== --}}
    @if (session()->get('language') == 'punjabi' )
            @forelse ($catWisePbiNews as $index => $pbiCatwise )
                    @if( $index == 0 )
                         <div class="col-sm-6" >
                            <!-- Item post -->
                            <div class="m-b-30">
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <a   target="_blank"  href="{{route('home.inner',['newsid' => $pbiCatwise->id , 'slug' =>  $pbiCatwise->slug ])}}" class="wrap-pic-w hov1 trans-03">

                                            <img src="{{ isset($pbiCatwise->image)? getNewsImage($pbiCatwise->image)  : asset('assets/images/post-05.jpg')}}" alt="IMG" class="img-fluid rounded">
                                        </a>
                                        <div class="p-t-20">
                                            <h5 class="p-b-5">
                                                <a  target="_blank"  href="{{route('home.inner',['newsid' => $pbiCatwise->id , 'slug' =>  $pbiCatwise->slug ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                                
                                                    {!!  Str::limit($pbiCatwise->title, 85) ?? "NA" !!}
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a  target="_blank"  href="{{route('home.category', ['id' => $pbiCatwise->getmenu->id, 'slug' => createSlug($pbiCatwise->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    
                                                    {!!  $pbiCatwise['getmenu']['category_pbi'] ?? "NA"  !!}
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {!! carbon\Carbon::parse($pbiCatwise->post_date)->format('M d, Y') ?? "NA" !!}
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else 
                    @endif
            @empty
            @endforelse
       <div class="col-sm-6">
            @forelse ( $catWisePbiNews as $key =>  $pbCatWise)
                        @if( $key > 0 )
                            <div class="card border-0 shadow-sm mb-3" >
                                <div class="card-body">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a  target="_blank"  href="{{route('home.inner',['newsid' => $pbCatWise->id , 'slug' =>  $pbCatWise->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {!! Str::limit($pbCatWise->title, 65) ?? "NA" !!}

                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a  target="_blank"  href="{{route('home.category', ['id' => $pbCatWise->getmenu->id, 'slug' => createSlug($pbCatWise->getmenu->category_en)
                                                    ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    {!!  $pbCatWise['getmenu']['category_pbi'] ?? "NA"  !!}


                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {!! carbon\Carbon::parse($pbCatWise->post_date)->format('M d, Y') ?? "NA" !!}

                                                </span>
                                            </span>
                                        </div>
                                        <a   target="_blank"  href="{{route('home.inner',['newsid' => $pbCatWise->id , 'slug' =>  $pbCatWise->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{ isset($pbCatWise->thumbnail)? getThumbnail($pbCatWise->thumbnail)  : asset('assets/images/post-06.jpg')}}" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else 
                        @endif
            @empty
            @endforelse
            </div>
    @endif

        {{-- ===================  urdu =================== --}}

        @if (session()->get('language') == 'urdu' )
        @forelse ($catWiseUrduNews as $index => $urduCatwise )
                @if( $index == 0 )
                    <div class="col-sm-6" >
                        <!-- Item post -->
                        <div class="m-b-30">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <a   target="_blank"  href="{{route('home.inner',['newsid' => $urduCatwise->id , 'slug' =>  $urduCatwise->slug ])}}" class="wrap-pic-w hov1 trans-03">

                                        <img src="{{ isset($urduCatwise->image)? getNewsImage($urduCatwise->image)  : asset('assets/images/post-05.jpg')}}" alt="IMG" class="img-fluid rounded">
                                    </a>
                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a  target="_blank"  href="{{route('home.inner',['newsid' => $urduCatwise->id , 'slug' =>  $urduCatwise->slug ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                            
                                                {!!  Str::limit($urduCatwise->title, 85) ?? "NA" !!}
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a  target="_blank"  href="{{route('home.category', ['id' => $urduCatwise->getmenu->id, 'slug' => createSlug($urduCatwise->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                
                                                {!!  $urduCatwise['getmenu']['category_urdu'] ?? "NA"  !!}
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!! carbon\Carbon::parse($urduCatwise->post_date)->format('M d, Y') ?? "NA" !!}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else 
                @endif
        @empty
        @endforelse
        <div class="col-sm-6">
        @forelse ( $catWiseUrduNews as $key =>  $catWise)
                    @if( $key > 0 )
                <div class="card border-0 shadow-sm mb-3" >
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a  target="_blank"  href="{{route('home.inner',['newsid' => $catWise->id , 'slug' =>  $catWise->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        {!! Str::limit($catWise->title, 65) ?? "NA" !!}

                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a  target="_blank"  href="{{route('home.category', ['id' => $catWise->getmenu->id, 'slug' => createSlug($catWise->getmenu->category_en)
                                        ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        {!! $catWise['getmenu']['category_urdu'] ?? "NA"  !!}

                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        {!! carbon\Carbon::parse($catWise->post_date)->format('M d, Y') ?? "NA" !!}

                                    </span>
                                </span>
                            </div>
                            <a   target="_blank"  href="{{route('home.inner',['newsid' => $catWise->id , 'slug' =>  $catWise->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{ isset($catWise->thumbnail)? getThumbnail($catWise->thumbnail)  : asset('assets/images/post-06.jpg')}}" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
            @else 
            @endif
        @empty
        @endforelse
        </div>
        @endif
    </div>
</div>

