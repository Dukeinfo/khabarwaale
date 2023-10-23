<div class="col-lg-3">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                <h3 class="f1-m-2 cl17 tab01-title">
                    @switch(session()->get('language'))
                    @case('hindi')
                        {!! 'ताजा खबर' !!}
                        @break
                    @case('english')
                        {!! 'Latest News'!!}
                    @break
                    @case('punjabi')
                        {!! 'ਤਾਜ਼ਾ ਖ਼ਬਰਾਂ'!!}
                        @break
                    @case('urdu')
                        {!!' تازہ ترین خبریں '!!}
                        @break
                    @default
                         {!! 'Latest News'!!}
                    @endswitch
                </h3>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @forelse ($catWiselatest_eng_News as   $latest_eng_News)
                    <div class="mb-3">
                        <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                            <h5 class="p-b-5">
                                <a href="{{route('home.inner',['newsid' => $latest_eng_News->id , 'slug' =>  $latest_eng_News->slug  ])}}
                                    " class="f1-s-5 cl3 hov-cl10 trans-03">
                                    <span class="text-danger mr-1">
                                        @if (session()->get('language') === 'hindi')
                                            {{$latest_eng_News['getmenu']['category_hin'] ?? "NA"}}:
                                        @elseif (session()->get('language') === 'english')
                                             {{$latest_eng_News['getmenu']['category_en'] ?? "NA"}}:
                                        @elseif (session()->get('language') === 'punjabi')
                                            {{$latest_eng_News['getmenu']['category_pbi'] ?? "NA"}}:
                                        @elseif (session()->get('language') === 'urdu')
                                            {{$latest_eng_News['getmenu']['category_urdu'] ?? "NA"}}:
                                        @else   
                                            {{$latest_eng_News['getmenu']['category_en'] ?? "NA"}}:
                                        @endif
                                    </span>
                                    {!! Str::limit($latest_eng_News->title, 70) !!} 
                                </a>
                            </h5>
                            <span class="cl8">
                                <span class="f1-s-3">
                          
                                          {{carbon\Carbon::parse($latest_eng_News->post_date)->format('M d, Y')}}
                                </span>
                            </span>
                        </div>
                    </div>
                    @empty
                            <P class="text-danger text-center"> No News Found</P>
                    @endforelse
                  
                     
                    @if(isset( $catWiselatest_eng_News) &&  count($catWiselatest_eng_News) > 0)
                    <div class="text-center">
                        <a href="javascript:void()" class="btn btn-primary px-5">

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
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-4">
            <div class="card bg-white shadow-sm text-center border-0">
                <div class="card-body">
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
                        @endswitch </p>
                        @if(isset($categorylatestleftAds))

                        <a href="javascript:void()" wire:poll>
                            <img src="{{getAddImage($categorylatestleftAds->image) }}" class="img-fluid" alt="">
                        </a>
                        @else
                        {{-- <a href="javascript:void()">
                            <img src="{{asset('assets/images/ads/v-ad1.gif')}}" class="img-fluid" alt="">
                        </a> --}}
                        @endif
                </div>
            </div>
        </div>
    </div>

</div>