<section class="p-t-50"  >
    <div class="container">
        <div class="row">
            @forelse ($getBottomMenus  as $menu )
            @if($menu->sort_id == 5 )
            <div class="col-sm-4 p-b-25">
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

                    </h3>
                    <a target="_blank"  href="{{route('home.category', ['id' => $menu->id, 'slug' =>   GoogleTranslate::trans( createSlug($menu->category_en, app()->getLocale()))])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                        {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}

                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                    </a>
                </div>
                <!-- Main Item post -->
                @forelse ( $fivthatWiseNews as $key  => $fivthnewscat )
                        @if($key == 0 )
                        <div class="mb-3" wire:poll >
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <a target="_blank"  href="{{route('home.inner',['newsid' => $fivthnewscat->id , 'slug' => GoogleTranslate::trans($fivthnewscat->slug, app()->getLocale())])}}" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{ isset($fivthnewscat->image)? getNewsImage($fivthnewscat->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded">
                                    </a>
                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a href="{{route('home.inner',['newsid' => $fivthnewscat->id , 'slug' =>  GoogleTranslate::trans($fivthnewscat->slug, app()->getLocale()) ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                                {!! GoogleTranslate::trans( Str::limit($fivthnewscat->title, 85), app()->getLocale()) ?? "NA" !!}
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a target="_blank"  href="{{route('home.category', ['id' => $fivthnewscat->getmenu->id, 'slug' =>  GoogleTranslate::trans(createSlug($fivthnewscat->getmenu->category_en), app()->getLocale()) ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                {!!GoogleTranslate::trans($fivthnewscat['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!! GoogleTranslate::trans( carbon\Carbon::parse($fivthnewscat->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else 
                        <div class="card border-0 shadow-sm mb-3" wire:poll>
                            <div class="card-body">
                                <div class="flex-wr-sb-s">
                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a target="_blank"  href="{{route('home.inner',['newsid' => $fivthnewscat->id , 'slug' =>  GoogleTranslate::trans($fivthnewscat->slug,  app()->getLocale()) ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                {!! GoogleTranslate::trans( Str::limit($fivthnewscat->title, 75), app()->getLocale()) ?? "NA" !!}

                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a target="_blank"  href="{{route('home.category', ['id' => $fivthnewscat->getmenu->id, 'slug' =>  GoogleTranslate::trans(createSlug($fivthnewscat->getmenu->category_en), app()->getLocale())  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                {!!GoogleTranslate::trans($fivthnewscat['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}

                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!! GoogleTranslate::trans( carbon\Carbon::parse($fivthnewscat->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}

                                            </span>
                                        </span>
                                    </div>
                                    <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{isset($fivthnewscat->thumbnail)?  getThumbnail($fivthnewscat->thumbnail)  : asset('assets/images/post-11.jpg')}}" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
            @endforelse
         
            </div>
            @endif
            @empty
            
            @endforelse

            @forelse ($getBottomMenus  as $menu )
            @if($menu->sort_id == 6  )
            <div class="col-sm-4 p-b-25"  >
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

                    </h3>
                    <a target="_blank"  href="{{route('home.category', ['id' => $menu->id, 'slug' =>  GoogleTranslate::trans(createSlug($menu->category_en), app()->getLocale()) ])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                        {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}

                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                    </a>
                </div>
                <!-- Main Item post -->
                @forelse ($sixCatWiseNews as $index => $sixCatNews )
                    @if($index  == 0 )
           
                <div class="mb-3"   wire:poll>
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <a target="_blank"  href="{{route('home.inner',['newsid' => $sixCatNews->id , 'slug' =>  GoogleTranslate::trans($sixCatNews->slug, app()->getLocale())  ])}}" class="wrap-pic-w hov1 trans-03">
                                <img src="{{ isset($sixCatNews->image)? getNewsImage($sixCatNews->image)  : asset('assets/images/post-34.jpg')}}" alt="IMG" class="img-fluid rounded">
                            </a>
                            <div class="p-t-20">
                                <h5 class="p-b-5">
                                    <a target="_blank"  href="{{route('home.inner',['newsid' => $sixCatNews->id , 'slug' =>  GoogleTranslate::trans($sixCatNews->slug, app()->getLocale())  ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                        {!! GoogleTranslate::trans( Str::limit($sixCatNews->title, 85), app()->getLocale()) ?? "NA" !!}
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="{{route('home.category', ['id' => $sixCatNews->getmenu->id, 'slug' =>  GoogleTranslate::trans(createSlug($sixCatNews->getmenu->category_en), app()->getLocale()) ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        {!!GoogleTranslate::trans($sixCatNews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}
                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        {!! GoogleTranslate::trans( carbon\Carbon::parse($sixCatNews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @else 

                <div class="card border-0 shadow-sm mb-3" wire:poll>
                    <div class="card-body">
                        <div class="flex-wr-sb-s">
                            <div class="size-w-2">
                                <h5 class="p-b-5">
                                    <a target="_blank"  href="{{route('home.inner',['newsid' => $sixCatNews->id , 'slug' =>  GoogleTranslate::trans($sixCatNews->slug, app()->getLocale())  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        {!! GoogleTranslate::trans( Str::limit($sixCatNews->title, 75), app()->getLocale()) ?? "NA" !!}

                                    </a>
                                </h5>
                                <span class="cl8">
                                    <a href="{{route('home.category', ['id' => $sixCatNews->getmenu->id, 'slug' =>  GoogleTranslate::trans( createSlug($sixCatNews->getmenu->category_en), app()->getLocale())])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                        {!!GoogleTranslate::trans($sixCatNews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}

                                    </a>
                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>
                                    <span class="f1-s-3">
                                        {!! GoogleTranslate::trans( carbon\Carbon::parse($sixCatNews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}

                                    </span>
                                </span>
                            </div>
                            <a target="_blank"  href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                <img src="{{ isset($sixCatNews->thumbnail)? getThumbnail($sixCatNews->thumbnail)  : asset('assets/images/post-35.jpg')}}" alt="" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @empty
                    
                @endforelse
          

            </div>
            @endif
            @empty
            
            @endforelse
            
            @forelse ($getBottomMenus  as $menu )
            @if($menu->sort_id == 7 )
            <div class="col-sm-4 p-b-25">
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

                    </h3>
                    <a target="_blank"  href="{{route('home.category', ['id' => $menu->id, 'slug' =>  GoogleTranslate::trans(createSlug($menu->category_en), app()->getLocale()) ])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                        {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}

                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                    </a>
                </div>
                <!-- Main Item post -->
                @forelse ($SevenCatWiseNews  as $key => $sevenCatnews )
                    @if( $key == 0  )
               
                    <div class="mb-3 " wire:poll  >
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <a target="_blank"   href="{{route('home.inner',['newsid' => $sevenCatnews->id , 'slug' =>  GoogleTranslate::trans($sevenCatnews->slug, app()->getLocale())])}}" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ isset($sevenCatnews->image)? getNewsImage($sevenCatnews->image)  : asset('assets/images/post-40.jpg')}}" alt="IMG" class="img-fluid rounded">
                                </a>
                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="{{route('home.inner',['newsid' => $sevenCatnews->id , 'slug' =>   GoogleTranslate::trans($sevenCatnews->slug, app()->getLocale())  ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                            {!! GoogleTranslate::trans( Str::limit($sevenCatnews->title, 85), app()->getLocale()) ?? "NA" !!}

                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a target="_blank"  href="{{route('home.category', ['id' => $sevenCatnews->getmenu->id, 'slug' =>  GoogleTranslate::trans(createSlug($sevenCatnews->getmenu->category_en), app()->getLocale()) ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            {!!GoogleTranslate::trans($sevenCatnews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}

                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            {!! GoogleTranslate::trans( carbon\Carbon::parse($sevenCatnews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @else 

                    <div class="card border-0 shadow-sm mb-3" wire:poll>
                        <div class="card-body">
                            <div class="flex-wr-sb-s">
                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a target="_blank"  href="{{route('home.inner',['newsid' => $sevenCatnews->id , 'slug' =>  GoogleTranslate::trans($sevenCatnews->slug, app()->getLocale())  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                         {!! GoogleTranslate::trans( Str::limit($sevenCatnews->title, 75), app()->getLocale()) ?? "NA" !!}

                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a target="_blank"  href="{{route('home.category', ['id' => $sevenCatnews->getmenu->id, 'slug' =>  GoogleTranslate::trans(createSlug($sevenCatnews->getmenu->category_en), app()->getLocale()) ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            {!!GoogleTranslate::trans($sevenCatnews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}

                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            {!! GoogleTranslate::trans( carbon\Carbon::parse($sevenCatnews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}

                                        </span>
                                    </span>
                                </div>
                                <a target="_blank"  href="{{route('home.inner',['newsid' => $sevenCatnews->id , 'slug' =>  GoogleTranslate::trans($sevenCatnews->slug, app()->getLocale())  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ isset($sevenCatnews->thumbnail)? getThumbnail($sevenCatnews->thumbnail)  : asset('assets/images/post-35.jpg')}}" alt="" class="img-fluid rounded">
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                @empty
                    
                @endforelse
            </div>
            @endif
            @empty
            
            @endforelse
        </div>
    </div>
</section>