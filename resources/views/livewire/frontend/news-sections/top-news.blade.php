<div class="col-lg-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                <h3 class="f1-m-2 cl17 tab01-title">
      
                    @switch(session()->get('language'))
                    @case('hindi')
                        {!!  'मुख्य समाचार' !!}
                        @break
                    @case('english')
                        {!! 'Top News'  !!}
                        @break
                    @case('punjabi')
                        {!! 'ਪ੍ਰਮੁੱਖ ਖਬਰਾਂ'  !!}
                        @break
                    @case('urdu')
                        {!! 'اہم خبریں۔' !!}
                        @break
                    @default
                        {!! 'Top News'  !!}
                    @endswitch  
                </h3>
            </div>
            @forelse ($topHinNewsData as  $key => $hintopNews )
                    @if($key === 0)
                        @if (session()->get('language') == 'hindi' )
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <div class="p-b-20">
                                        <h5 class="p-b-5">
                                            <a target="_blank" href="{{route('home.inner',['newsid' => $hintopNews->id , 'slug' =>  $hintopNews->slug  ])}}" class="f1-m-3 cl2 hov-cl10 trans-03 font-weight-bold">
                                           
                                                    {!! Str::limit($hintopNews->title, 70) !!} 
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a target="_blank" href="{{route('home.category', ['id' => $hintopNews->getmenu->id, 'slug' => createSlug($hintopNews->getmenu->category_en)
                                                ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            
                                                {{$hintopNews['getmenu']['category_hin'] ?? "NA"}}
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {{carbon\Carbon::parse($hintopNews->post_date)->format('M d, Y')}}

                                            </span>
                                        </span>
                                    </div>
                                    <a target="_blank" href="{{route('home.inner',['newsid' => $hintopNews->id , 'slug' =>  $hintopNews->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{  isset($hintopNews->image)?getNewsImage($hintopNews->image) : asset('assets/images/news/n1.jpg')}}" alt="IMG" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        @endif
                    @else   
                        @if (session()->get('language') == 'hindi' )

                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a target="_blank" href="{{route('home.inner',['newsid' => $hintopNews->id , 'slug' =>  $hintopNews->slug  ])}}" target="_blank" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                 
                                                    {!! Str::limit($hintopNews->title, 65) !!} 
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a target="_blank"  href="{{route('home.category', ['id' => $hintopNews->getmenu->id, 'slug' => createSlug($hintopNews->getmenu->category_en)
                                                    ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    {{$hintopNews['getmenu']['category_hin'] ?? "NA"}}
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {{carbon\Carbon::parse($hintopNews->post_date)->format('M d, Y')}}
                                                </span>
                                            </span>
                                        </div>
                                        <a target="_blank" href="{{route('home.inner',['newsid' => $hintopNews->id , 'slug' =>  $hintopNews->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{  isset($hintopNews->thumbnail)? getThumbnail($hintopNews->thumbnail)  :  asset('assets/images/post-06.jpg')}}" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
            @empty 
            @endforelse

                        {{-- english  --}}
                @forelse ($topEngNewsData as  $key => $topNews )
                        @if($key === 0)
                            @if (session()->get('language') == 'english' )
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="p-b-20">
                                            <h5 class="p-b-5">
                                                <a target="_blank" href="{{route('home.inner',['newsid' => $topNews->id , 'slug' =>  $topNews->slug  ])}}" class="f1-m-3 cl2 hov-cl10 trans-03 font-weight-bold">
                                                  
                                                        {!! Str::limit($topNews->title, 70) !!} 
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a target="_blank" href="{{route('home.category', ['id' => $topNews->getmenu->id, 'slug' => createSlug($topNews->getmenu->category_en)
                                                    ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                
                                                    {{$topNews['getmenu']['category_en'] ?? "NA"}}
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {{carbon\Carbon::parse($topNews->post_date)->format('M d, Y')}}
    
                                                </span>
                                            </span>
                                        </div>
                                        <a  target="_blank" href="{{route('home.inner',['newsid' => $topNews->id , 'slug' =>  $topNews->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{  isset($topNews->image)?  getNewsImage($topNews->image) : asset('assets/images/news/n1.jpg')}}" alt="IMG" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @else   
                            @if (session()->get('language') == 'english' )
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a target="_blank" href="{{route('home.inner',['newsid' => $topNews->id , 'slug' =>  $topNews->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                       
                                                        {!! Str::limit($topNews->title, 65) !!} 
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <a target="_blank"  href="{{route('home.category', ['id' => $topNews->getmenu->id, 'slug' => createSlug($topNews->getmenu->category_en)
                                                        ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        {{$topNews['getmenu']['category_en'] ?? "NA"}}
                                                    </a>
                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>
                                                    <span class="f1-s-3">
                                                        {{carbon\Carbon::parse($topNews->post_date)->format('M d, Y')}}
                                                    </span>
                                                </span>
                                            </div>
                                            <a  target="_blank" href="{{route('home.inner',['newsid' => $topNews->id , 'slug' =>  $topNews->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{  isset($topNews->thumbnail)? getThumbnail($topNews->thumbnail)  : asset('assets/images/post-06.jpg')}}" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                @empty 
                @endforelse
                        {{-- punjabi  --}}
                @forelse ($topPbiNewsData as  $key => $topNews )
                        @if($key === 0)
                            @if (session()->get('language') == 'punjabi' )
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="p-b-20">
                                            <h5 class="p-b-5">
                                                <a target="_blank"  href="{{route('home.inner',['newsid' => $topNews->id , 'slug' =>  $topNews->slug  ])}}" class="f1-m-3 cl2 hov-cl10 trans-03 font-weight-bold">
                                               
                                                        {!! Str::limit($topNews->title, 70) !!} 
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a target="_blank"  href="{{route('home.category', ['id' => $topNews->getmenu->id, 'slug' => createSlug($topNews->getmenu->category_en)
                                                    ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                
                                                    {{$topNews['getmenu']['category_pbi'] ?? "NA"}}
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {{carbon\Carbon::parse($topNews->post_date)->format('M d, Y')}}
    
                                                </span>
                                            </span>
                                        </div>
                                        <a href="{{route('home.inner',['newsid' => $topNews->id , 'slug' =>  $topNews->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{  isset($topNews->image)?  getNewsImage($topNews->image)   : asset('assets/images/news/n1.jpg')}}" alt="IMG" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @else   
                            @if (session()->get('language') == 'punjabi' )
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a target="_blank"   href="{{route('home.inner',['newsid' => $topNews->id , 'slug' =>  $topNews->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                       
                                                        {!! Str::limit($topNews->title, 65) !!} 
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <a target="_blank"   href="{{route('home.category', ['id' => $topNews->getmenu->id, 'slug' => createSlug($topNews->getmenu->category_en)
                                                        ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        {{$topNews['getmenu']['category_pbi'] ?? "NA"}}
                                                    </a>
                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>
                                                    <span class="f1-s-3">
                                                        {{carbon\Carbon::parse($topNews->post_date)->format('M d, Y')}}
                                                    </span>
                                                </span>
                                            </div>
                                            <a target="_blank"  href="{{route('home.inner',['newsid' => $topNews->id , 'slug' =>  $topNews->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{  isset($topNews->thumbnail)? getThumbnail($topNews->thumbnail)  : asset('assets/images/post-06.jpg')}}" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                @empty 
                @endforelse
                        {{-- urdu  --}}
                        @forelse ($topUrduNewsData as  $key => $topNews )
                        @if($key === 0)
                            @if (session()->get('language') == 'urdu' )
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="p-b-20">
                                            <h5 class="p-b-5">
                                                <a  target="_blank" href="{{route('home.inner',['newsid' => $topNews->id , 'slug' =>  $topNews->slug  ])}}" class="f1-m-3 cl2 hov-cl10 trans-03 font-weight-bold">
                                                   
                                                        {!! Str::limit($topNews->title, 70) !!} 
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a target="_blank" href="{{route('home.category', ['id' => $topNews->getmenu->id, 'slug' => createSlug($topNews->getmenu->category_en)
                                                    ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                
                                                    {{$topNews['getmenu']['category_urdu'] ?? "NA"}}
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {{carbon\Carbon::parse($topNews->post_date)->format('M d, Y')}}
    
                                                </span>
                                            </span>
                                        </div>
                                        <a target="_blank" href="{{route('home.inner',['newsid' => $topNews->id , 'slug' =>  $topNews->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{ isset($topNews->image)? getNewsImage($topNews->image)  : asset('assets/images/news/n1.jpg')}}" alt="IMG" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @else   
                            @if (session()->get('language') == 'urdu' )
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a target="_blank" href="{{route('home.inner',['newsid' => $topNews->id , 'slug' =>  $topNews->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                      
                                                        {!! Str::limit($topNews->title, 65) !!} 
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <a target="_blank"  href="{{route('home.category', ['id' => $topNews->getmenu->id, 'slug' => createSlug($topNews->getmenu->category_en)
                                                        ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        {{$topNews['getmenu']['category_urdu'] ?? "NA"}}
                                                    </a>
                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>
                                                    <span class="f1-s-3">
                                                        {{carbon\Carbon::parse($topNews->post_date)->format('M d, Y')}}
                                                    </span>
                                                </span>
                                            </div>
                                            <a target="_blank" href="{{route('home.inner',['newsid' => $topNews->id , 'slug' =>  $topNews->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ isset($topNews->thumbnail)? getThumbnail($topNews->thumbnail)  :  asset('assets/images/post-06.jpg')}}" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                @empty 
                @endforelse

            <div class="text-center">
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
                    @endswitch 
                </p>
                <a href="javascript:void()">
                    <img src="{{asset('assets/images/ads/ad2.jpg')}}" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</div>