

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

        @forelse ($ca1t_Wise_News as $index => $cat1_wise )
                 @if( $index == 0 )
                    <div class="col-sm-6" >
                        <!-- Item post -->
                        <div class="m-b-30">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <a   target="_blank"  href="{{route('home.inner',['newsid' => $cat1_wise->id , 'slug' =>  $cat1_wise->slug ])}}" class="wrap-pic-w hov1 trans-03">

                                        <img src="{{ isset($cat1_wise->image)? getNewsImage($cat1_wise->image)  : asset('assets/images/post-05.jpg')}}" alt="IMG" class="img-fluid rounded">
                                    </a>
                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat1_wise->id , 'slug' =>  $cat1_wise->slug ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                            
                                                {!!  Str::limit($cat1_wise->title, 85) ?? "NA" !!}
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $cat1_wise->getmenu->id, 'slug' => createSlug($cat1_wise->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                


                                                    @if (session()->get('language') === 'hindi')
                                                        {{$cat1_wise['getmenu']['category_hin'] ?? "NA"}}:
                                                    @elseif (session()->get('language') === 'english')
                                                        {{$cat1_wise['getmenu']['category_en'] ?? "NA"}}:
                                                    @elseif (session()->get('language') === 'punjabi')
                                                        {{$cat1_wise['getmenu']['category_pbi'] ?? "NA"}}:
                                                    @elseif (session()->get('language') === 'urdu')
                                                        {{$cat1_wise['getmenu']['category_urdu'] ?? "NA"}}:
                                                    @else   
                                                        {{$cat1_wise['getmenu']['category_en'] ?? "NA"}}:
                                                    @endif
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!! carbon\Carbon::parse($cat1_wise->post_date)->format('M d, Y') ?? "NA" !!}
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
                @forelse ( $ca1t_Wise_News as $key =>  $cat1_wise)
                        @if( $key > 0 )
                            <div class="card border-0 shadow-sm mb-3" >
                                <div class="card-body">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat1_wise->id , 'slug' =>  $cat1_wise->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {!! Str::limit($cat1_wise->title, 65) ?? "NA" !!}

                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a  target="_blank"  href="{{route('home.category', ['id' => $cat1_wise->getmenu->id, 'slug' => createSlug($cat1_wise->getmenu->category_en)
                                                    ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        @if (session()->get('language') === 'hindi')
                                                            {{$cat1_wise['getmenu']['category_hin'] ?? "NA"}}:
                                                        @elseif (session()->get('language') === 'english')
                                                            {{$cat1_wise['getmenu']['category_en'] ?? "NA"}}:
                                                        @elseif (session()->get('language') === 'punjabi')
                                                            {{$cat1_wise['getmenu']['category_pbi'] ?? "NA"}}:
                                                        @elseif (session()->get('language') === 'urdu')
                                                            {{$cat1_wise['getmenu']['category_urdu'] ?? "NA"}}:
                                                        @else   
                                                            {{$cat1_wise['getmenu']['category_en'] ?? "NA"}}:
                                                        @endif

                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {!!  carbon\Carbon::parse($cat1_wise->post_date)->format('M d, Y') ?? "NA" !!}

                                                </span>
                                            </span>
                                        </div>
                                        <a   target="_blank"  href="{{route('home.inner',['newsid' => $cat1_wise->id , 'slug' =>  $cat1_wise->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{ isset($cat1_wise->thumbnail)? getThumbnail($cat1_wise->thumbnail)  : asset('assets/images/post-06.jpg')}}" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else 
                        @endif
                @empty
                
                        @switch(session()->get('language'))
                        @case('hindi')
                                <p class="text-center text-danger"> {!! "कोई खबर नहीं मिली" !!}     </p>
                            @break
                        @case('punjabi')
                                <p class="text-center text-danger">   {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ' !!}</p>
                            @break
                        @case('urdu')
                            <p class="text-center text-danger">   {!! 'کوئی خبر نہیں ملی' !!}</p>
                            @break
                        @case('english')
                            <p class="text-center text-danger">   {{" No news found"}}</p>
                        @break
                        @default
                            <p class="text-center text-danger">   {{" No news found"}}</p>
                        @endswitch

                @endforelse
        </div>

        {{-- ===================  Hindi =================== --}}




    </div>
</div>

