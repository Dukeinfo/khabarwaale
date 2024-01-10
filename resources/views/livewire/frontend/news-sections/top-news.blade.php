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
            @forelse ($top_NewsData as  $key => $hintopNews )
                    @if($key === 0)
                 
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <div class="p-b-20">
                                        <h5 class="p-b-5">
                                            <a target="_blank" href="{{route('home.inner',['newsid' => $hintopNews->id , 'slug' =>  md5createSlug($hintopNews->slug)  ])}}" class="f1-m-3 cl2 hov-cl10 trans-03 font-weight-bold">
                                           
                                                    {!! Str::limit($hintopNews->title, 70) !!} 
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a target="_blank" href="{{route('home.category', ['id' => $hintopNews->getmenu->id, 'slug' => createSlug($hintopNews->getmenu->category_en)
                                                ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            

                                                @if (session()->get('language') === 'hindi')
                                                    {{$hintopNews['getmenu']['category_hin'] ?? "NA"}}:
                                                @elseif (session()->get('language') === 'english')
                                                    {{$hintopNews['getmenu']['category_en'] ?? "NA"}}:
                                                @elseif (session()->get('language') === 'punjabi')
                                                    {{$hintopNews['getmenu']['category_pbi'] ?? "NA"}}:
                                                @elseif (session()->get('language') === 'urdu')
                                                    {{$hintopNews['getmenu']['category_urdu'] ?? "NA"}}:
                                                @else   
                                                    {{$hintopNews['getmenu']['category_en'] ?? "NA"}}:
                                                @endif
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {{carbon\Carbon::parse($hintopNews->post_date)->format('M d, Y')}}

                                            </span>
                                        </span>
                                    </div>
                                    <a target="_blank" href="{{route('home.inner',['newsid' => $hintopNews->id , 'slug' => md5createSlug( $hintopNews->slug)  ])}}" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{  isset($hintopNews->image)?getNewsImage($hintopNews->image) : asset('assets/images/news/n1.jpg')}}" alt="IMG" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                      
                    @else   
                      

                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a target="_blank" href="{{route('home.inner',['newsid' => $hintopNews->id , 'slug' => md5createSlug( $hintopNews->slug)  ])}}" target="_blank" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                 
                                                    {!! Str::limit($hintopNews->title, 65) !!} 
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a target="_blank"  href="{{route('home.category', ['id' => $hintopNews->getmenu->id, 'slug' => createSlug($hintopNews->getmenu->category_en)
                                                    ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">

                                                    @if (session()->get('language') === 'hindi')
                                                        {{$hintopNews['getmenu']['category_hin'] ?? "NA"}}:
                                                    @elseif (session()->get('language') === 'english')
                                                        {{$hintopNews['getmenu']['category_en'] ?? "NA"}}:
                                                    @elseif (session()->get('language') === 'punjabi')
                                                        {{$hintopNews['getmenu']['category_pbi'] ?? "NA"}}:
                                                    @elseif (session()->get('language') === 'urdu')
                                                        {{$hintopNews['getmenu']['category_urdu'] ?? "NA"}}:
                                                    @else   
                                                        {{$hintopNews['getmenu']['category_en'] ?? "NA"}}:
                                                    @endif
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {{carbon\Carbon::parse($hintopNews->post_date)->format('M d, Y')}}
                                                </span>
                                            </span>
                                        </div>
                                        
                                        <a target="_blank" href="{{route('home.inner',['newsid' => $hintopNews->id , 'slug' =>  md5createSlug($hintopNews->slug ) ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        
                                            <img src="{{  isset($hintopNews->thumbnail)? getThumbnail($hintopNews->thumbnail)  :  getNewsImage($hintopNews->image)}}" alt="" class="img-fluid rounded">
                                          
                                           
                                            
                                        </a>  
                                    </div>
                                </div>
                            </div>
                       
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
                @if(isset($topNewsCentertAds))
                
                <a href="{{$topNewsCentertAds->link_add  ?? '#'}}">
                    <img src="{{ getAddImage($topNewsCentertAds->image) }}" class="img-fluid" alt="">
                </a>
                @else
           
                @endif
            </div>
        </div>
    </div>
</div>