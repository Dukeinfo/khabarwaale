
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
                {{-- ====================== hindi ==================== --}}
                    @forelse ($latestHinNewsData as $news )
                            {{-- Hindi  --}}
                            <div class="mb-3">
                                <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                    <h5 class="p-b-5">
                                        {{-- <a target="_blank" href="{{route('home.inner',['newsid' => $news->id , 'slug' =>  $news->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03"> --}}
                                            @if (strpos($news->category_id, ',') === false)
                                            {{-- Single category ID --}}
                                                <a  target="_blank"  href="{{ route('home.category', ['id' => $news->getmenu->id, 'slug' => createSlug($news->getmenu['category_en'])]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    <span class="text-danger mr-1">
                                                    @if (session()->get('language') === 'hindi')
                                                        {{$news['getmenu']['category_hin'] ?? "NA"}}
                                                    @elseif (session()->get('language') === 'english')
                                                        {{$news['getmenu']['category_en'] ?? "NA"}}
                                                    @elseif (session()->get('language') === 'punjabi')
                                                        {{$news['getmenu']['category_pbi'] ?? "NA"}}
                                                    @elseif (session()->get('language') === 'urdu')
                                                        {{$news['getmenu']['category_urdu'] ?? "NA"}}
                                                    @else   
                                                        {{$news['getmenu']['category_en'] ?? "NA"}}
                                                    @endif
                                                    </span>
                                                </a>
                                            @else
                                            {{-- Multiple category IDs --}}
                                            @php
                                                    $categoryIdsArray = explode(',', $news->category_id);
                                                    $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->get();
                                            @endphp
                                            @foreach ($categories as $key => $category)
                                            @if ($loop->index < 2)
                                                <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    <span class="text-danger mr-1">
                                                    @if (session()->get('language') === 'hindi')
                                                        {{ $category->category_hin ?? "NA" }}
                                                    @elseif (session()->get('language') === 'english')
                                                        {{ $category->category_en ?? "NA" }}
                                                    @elseif (session()->get('language') === 'punjabi')
                                                        {{ $category->category_pbi ?? "NA" }},
                                                    @elseif (session()->get('language') === 'urdu')
                                                        {{$category->category_urdu ?? "NA" }}
                                                    @else   
                                                        {{ $category->category_en ?? "NA" }}
                                                    @endif
                                                    </span>
                                                </a>
                                            @endif
                                            @endforeach
                                            @endif
                                            {!! Str::limit($news->title, 60) !!} 
                                                    <a target="_blank" href="{{route('home.inner',['newsid' => $news->id , 'slug' =>  $news->slug  ])}}" class=" hov1">
                                                        ਦੇਖੋ
                                                    </a>
                                                    
                                        {{-- </a> --}}
                                    </h5>
                                    <span class="cl8">
                                        <span class="f1-s-3">
                                        {{carbon\Carbon::parse($news->post_date)->format('M d, Y')}}
                                        </span>
                                    </span>
                                </div>
                            </div> 
                      
                        @empty
                            <p class="text-danger"> 
                                @if (session()->get('language') == "hindi" )
                                {!!  'कोई खबर नहीं मिली' !!}
                                @endif
                                 @if (session()->get('language') == "english" )
                                 {!! 'No news found' !!}
                                @endif
                                 @if (session()->get('language') == "punjabi" )
                                 {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ'!!}
                                @endif
                                 @if (session()->get('language') == "urdu" )
                                 {!! 'کوئی خبر نہیں ملی'!!}
                                @endif
                            </p>
                    @endforelse
                {{-- ====================== Punjabi ==================== --}}

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
                </div>
            </div>
        </div>
        
        @if(isset($latestRightAds))
        <div class="col-lg-12 mb-4">
            <div class="card bg-white shadow-sm text-center border-0">
                <div class="card-body">
                    <a href="javascript:void()">
                        <img src="{{getAddImage($latestRightAds->image) }}"  class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div>
        @else
        {{-- <a href="javascript:void()">
            <img src="{{asset('assets/images/ads/v-ad1.gif')}}" class="img-fluid" alt="">
        </a> --}}
        @endif
    </div>
</div>
