<div class="row">
    @forelse ($getMenus  as $menu )
       @if($menu->sort_id == 2 )
    {{-- chnadigarh --}}
        <div class="col-sm-6 p-b-25">
            <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white" wire:loading.remove>
                <h3 class="f1-m-2 cl17 tab01-title">
                    {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}
                
                </h3>

        
                <a  target="_blank"  href="{{route('home.category', ['id' => $menu->id, 'slug' => GoogleTranslate::trans( createSlug($menu->category_en), app()->getLocale())
                   ])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                    {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}

                </a>
            </div>

            <!-- Main Item post -->
            @forelse ($secondCatWiseNews as $key => $secondCatNews )
                @if( $key == 0 )

                    <div class="mb-3">
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <a  target="_blank" href="{{route('home.inner',['newsid' => $secondCatNews->id , 'slug' => GoogleTranslate::trans( $secondCatNews->slug, app()->getLocale())   ])}}" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{   isset($secondCatNews->image)? getNewsImage($secondCatNews->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded">
                                </a>
                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a  target="_blank" href="{{route('home.inner',['newsid' => $secondCatNews->id , 'slug' => GoogleTranslate::trans( $secondCatNews->slug, app()->getLocale()) ])}};" class="f1-s-5 cl2 hov-cl10 trans-03">
                                        {!! GoogleTranslate::trans( Str::limit($secondCatNews->title, 75), app()->getLocale()) ?? "NA" !!}
                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a  target="_blank" href="{{route('home.category', ['id' => $secondCatNews->getmenu->id, 'slug' => GoogleTranslate::trans(createSlug($secondCatNews->getmenu->category_en), app()->getLocale())
                                            ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            
                                            
                                        {!!GoogleTranslate::trans($secondCatNews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}
                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            {!! GoogleTranslate::trans( carbon\Carbon::parse($secondCatNews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}
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
                                    <a  target="_blank" href="{{route('home.inner',['newsid' => $secondCatNews->id , 'slug' =>  GoogleTranslate::trans( $secondCatNews->slug, app()->getLocale())  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        {!! GoogleTranslate::trans( Str::limit($secondCatNews->title, 50), app()->getLocale()) ?? "NA" !!}

                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a   target="_blank" href="{{route('home.category', ['id' => $secondCatNews->getmenu->id, 'slug' =>  GoogleTranslate::trans( createSlug($secondCatNews->getmenu->category_en), app()->getLocale()) ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        {!!GoogleTranslate::trans($secondCatNews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}

                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        {!! GoogleTranslate::trans( carbon\Carbon::parse($secondCatNews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}

                                    </span>
                                </span>
                            </div>
                            <a   target="_blank" href="{{route('home.inner',['newsid' => $secondCatNews->id , 'slug' =>  GoogleTranslate::trans( $secondCatNews->slug, app()->getLocale())  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{ isset($secondCatNews->thumbnail)? getThumbnail($secondCatNews->thumbnail)   : asset('assets/images/post-11.jpg')}}" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
                @endif

            @empty
                    
            @endforelse
        

        </div>
    {{-- chnadigarh --}}

    @endif
    {{--  =============================== 3rd Category wise news    ===============================--}}

    @if($menu->sort_id == 3 )
    {{-- Sports --}}
        <div class="col-sm-6 p-b-25">
            <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                <h3 class="f1-m-2 cl17 tab01-title">
                    {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

                </h3>
                <a  target="_blank"  href="{{route('home.category', ['id' => $menu->id, 'slug' =>  GoogleTranslate::trans( createSlug($menu->category_en), app()->getLocale())  ])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                    {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}

                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                </a>
            </div>

            @php
            $thirdCatWiseNews = \App\Models\NewsPost::with('getmenu', 'newstype')
                ->where(function ($query) use ($menu) {
                    $query->where('status', 'Approved')
                        ->whereNull('deleted_at')
                        ->where('category_id', $menu->id);
            
                    if ($menu->sort_id == 3) {
                        $query->orderByRaw('RAND()');
                    } else {
                        $query->orWhere(function ($subquery) {
                            $subquery->where('category_id', '<=', 4)
                                ->orWhereNull('category_id');
                        });
                    }
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('updated_at', 'desc') 
                ->limit(4)
                ->get();
            
            @endphp
            <!-- Main Item post -->
            @forelse ($thirdCatWiseNews as $index => $thirdcatNews )
                @if($index == 0 )

                    <div class="mb-3">
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <a href="{{route('home.inner',['newsid' => $thirdcatNews->id , 'slug' =>  GoogleTranslate::trans($thirdcatNews->slug,  app()->getLocale()) ])}}" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{  isset($thirdcatNews->image)? getNewsImage($thirdcatNews->image)  : asset('assets/images/post-34.jpg')}}" alt="IMG" class="img-fluid rounded">
                                </a>
                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a  target="_blank" href="{{route('home.inner',['newsid' => $thirdcatNews->id , 'slug' =>  GoogleTranslate::trans($thirdcatNews->slug,  app()->getLocale()) ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                            {!! GoogleTranslate::trans( Str::limit($thirdcatNews->title, 75), app()->getLocale()) ?? "NA" !!}

                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a   target="_blank" href="{{route('home.category', ['id' => $thirdcatNews->getmenu->id, 'slug' => createSlug($thirdcatNews->getmenu->category_en)])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            {!!GoogleTranslate::trans($thirdcatNews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}
                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            {!! GoogleTranslate::trans( carbon\Carbon::parse($thirdcatNews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}
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
                                        <a  target="_blank"  href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                    
                                            {!! GoogleTranslate::trans( Str::limit($thirdcatNews->title, 65), app()->getLocale()) ?? "NA" !!}
                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a  target="_blank" href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            
                                        {!!GoogleTranslate::trans($thirdcatNews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}
                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            
                                            {!! GoogleTranslate::trans( carbon\Carbon::parse($thirdcatNews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}
                                        </span>
                                    </span>
                                </div>
                                <a   target="_blank" href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{  isset($thirdcatNews->thumbnail)? getThumbnail($thirdcatNews->thumbnail)   :  asset('assets/images/post-35.jpg')}}" alt="" class="img-fluid rounded">
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                
            @endforelse

        </div>
    {{-- Sports --}}

        @endif
    @empty
    
    @endforelse
</div>