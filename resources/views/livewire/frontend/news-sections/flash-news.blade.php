<section class="bg-white" >
    <div class="container">
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
                <span class="text-uppercase cl2 p-r-20">
                    <p class="breaking_tag"><i class="fa fa-circle"></i><span class="blink">
                        @if (session()->get('language') === 'hindi')
                                 {!!  'ताजा खबर' !!}
                        @elseif (session()->get('language') === 'english')
                                {!! ' Breaking News'  !!}
                        @elseif (session()->get('language') === 'punjabi')
                                {!! 'ਤਾਜਾ ਖਬਰਾਂ'  !!}
                        @elseif (session()->get('language') === 'urdu')
                                {!! 'تازہ ترین خبر' !!}
                        @endif
                    
                    </span></p>
                </span>
                <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
                    
                    @forelse ($newsPosts  as  $key => $flashNews )
                    @if ($flashNews->news_type == 1 && session()->get('language') === 'hindi')
                    <span class="dis-inline-block slide100-txt-item animated visible-false" >
                        <a  target="_blank" href="{{route('home.inner',['newsid' => $flashNews->id , 'slug' =>  $flashNews->slug  ])}}
                            " class="cl6">
                            {!! Str::limit($flashNews->title, 60)!!} 
                        </a>
                    </span>
                      @elseif ($flashNews->news_type == 2 && session()->get('language') === 'english')
                            <span class="dis-inline-block slide100-txt-item animated visible-false" >
                                <a  target="_blank" href="{{route('home.inner',['newsid' => $flashNews->id , 'slug' =>  $flashNews->slug  ])}}" class="cl6">
                                    {!! Str::limit($flashNews->title, 60)!!} 
                                </a>
                            </span>
                        @elseif ($flashNews->news_type == 3 && session()->get('language') === 'punjabi')
                            <!-- Display Punjabi news -->
                            <span class="dis-inline-block slide100-txt-item animated visible-false" >
                                <a  target="_blank" href="{{route('home.inner',['newsid' => $flashNews->id , 'slug' =>   $flashNews->slug  ])}}" class="cl6">
                                    {!! Str::limit($flashNews->title, 60)!!} 
                                </a>
                            </span>
                        
                        @elseif ($flashNews->news_type == 4 && session()->get('language') === 'urdu')
                            <!-- Display Urdu news -->
                            <span class="dis-inline-block slide100-txt-item animated visible-false" >
                                <a  target="_blank" href="{{route('home.inner',['newsid' => $flashNews->id , 'slug' =>  $flashNews->slug  ])}}" class="cl6">
                                    {!! Str::limit($flashNews->title, 60)!!} 
                                </a>
                            </span>
                
                         
                        @endif

                    @empty
                    <span class="dis-inline-block slide100-txt-item animated visible-false">
                        <a href="javascript:void()" class="cl6">
                            @switch(session()->get('language'))
                            @case('hindi')
                                {!! "कोई खबर नहीं मिली" !!}
                                @break
                            @case('punjabi')
                                {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ' !!}
                                @break
                            @case('urdu')
                                {!! 'کوئی خبر نہیں ملی' !!}
                                @break
                            @case('english')
                                {{" No news found"}}
                            @break
                            @default
                            {{" No news found"}}
                            @endswitch
                        </a>
                    </span>
                    @endforelse
            
                </span>
            </div>
            <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
                <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        </div>
    </div>
</section>
