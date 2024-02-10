<section class="p-t-30">
    <div class="container">
        <div class="row m-rl--1">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                Latest News
                            </h3>
                        </div>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <h5 class="p-b-5">
                                            <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                <span class="text-danger mr-1">Chandigarh:</span>
                                                ED arrests woman IAS officer Ranu Sahu in alleged coal levy case in Chandigarh
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <span class="f1-s-3">
                                                Jul 22, 2023
                                            </span>
                                        </span>
                                    </div>
                                </div>
                     
                       
                        
                   
                                <div class="text-center">
                                    <a href="javascript:void()" class="btn btn-primary px-5">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-12 mb-4">
                        <div class="card bg-white shadow-sm text-center border-0">
                            <div class="card-body">
                                <p class="text-uppercase text-center small pb-2">Advertisement</p>
                                <a href="javascript:void()">
                                    <img src="{{asset('assets')}}/images/ads/v-ad1.gif" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        {{-- <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                @if (session()->get('language') === 'hindi')
                                         {{ $category_hin  ?? "NA"}}
                                @elseif (session()->get('language') === 'english')
                                        {{ $category_en  ?? "NA"}}
                                @elseif (session()->get('language') === 'punjabi')
                                        {{ $category_pbi ?? "NA"}}
                                @elseif (session()->get('language') === 'urdu')
                                        {{ $category_urdu ?? "NA"}}
                                @else   
                                        {{ $category_en  ?? "NA"}}
                                @endif
                            </h3>
                        </div> --}}
             
                    
                        @php $articleCount = 0 @endphp
                        @php $showAds = true @endphp
                        @forelse ($archivePosts as $key => $catNewsData)
                            @if($key == 0 ) 
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="p-b-20">
                                            <h5 class="p-b-5">
                                                <a target="_blank" href="{{route('home.inner',['newsid' => $catNewsData->id , 'slug' =>  $catNewsData->slug  ])}}" class="f1-m-3 cl2 hov-cl10 trans-03 font-weight-bold">
                                            
                                                        {!! Str::limit($catNewsData->title, 70) !!} 
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                {{-- <a target="_blank" href="{{route('home.category', ['id' => $catNewsData->getmenu->id, 'slug' => createSlug($catNewsData->getmenu->category_en)
                                                    ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                
                                                    @if (session()->get('language') === 'hindi')
                                                            {{$catNewsData['getmenu']['category_hin'] ?? "NA"}}
                                                    @elseif (session()->get('language') === 'english')
                                                        {{$catNewsData['getmenu']['category_en'] ?? "NA"}}
                                                    @elseif (session()->get('language') === 'punjabi')
                                                        {{$catNewsData['getmenu']['category_pbi'] ?? "NA"}}
                                                    @elseif (session()->get('language') === 'urdu')
                                                            {{$catNewsData['getmenu']['category_urdu'] ?? "NA"}}
                                                    @else   
                                                            {{$catNewsData['getmenu']['category_en'] ?? "NA"}}
                                                    @endif
                                                </a> --}}

                                                @if (strpos($catNewsData->category_id, ',') === false)
                                                {{-- Single category ID --}}
                                                    <a  target="_blank"  href="{{ route('home.category', ['id' => $catNewsData->getmenu->id, 'slug' => createSlug($catNewsData->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                        @if (session()->get('language') === 'hindi')
                                                            {{$catNewsData['getmenu']['category_hin'] ?? "NA"}}
                                                        @elseif (session()->get('language') === 'english')
                                                            {{$catNewsData['getmenu']['category_en'] ?? "NA"}}
                                                        @elseif (session()->get('language') === 'punjabi')
                                                            {{$catNewsData['getmenu']['category_pbi'] ?? "NA"}}
                                                        @elseif (session()->get('language') === 'urdu')
                                                            {{$catNewsData['getmenu']['category_urdu'] ?? "NA"}}
                                                        @else   
                                                            {{$catNewsData['getmenu']['category_en'] ?? "NA"}}
                                                        @endif
                                                    </a>
                                                @else
                                                {{-- Multiple category IDs --}}
                                                @php
                                                        $categoryIdsArray = explode(',', $catNewsData->category_id);
                                                        $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->get();
                                                @endphp
                                                @foreach ($categories as $key => $category)
                                                @if ($loop->index < 3)
                                                    <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
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
                                                    </a>
                                                @endif
                                                @endforeach
                                                @endif
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {{carbon\Carbon::parse($catNewsData->post_date)->format('M d, Y')}}

                                                </span>
                                            </span>
                                        </div>
                                        <a target="_blank" href="{{route('home.inner',['newsid' => $catNewsData->id , 'slug' =>  $catNewsData->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{  isset($catNewsData->image)?getNewsImage($catNewsData->image) : asset('assets/images/news/n1.jpg')}}" alt="IMG" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a target="_blank" href="{{route('home.inner',['newsid' => $catNewsData->id , 'slug' =>  $catNewsData->slug  ])}}" target="_blank" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    
                                                        {!! Str::limit($catNewsData->title, 65) !!} 
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    @if (strpos($catNewsData->category_id, ',') === false)
                                                    {{-- Single category ID --}}
                                                        <a  target="_blank"  href="{{ route('home.category', ['id' => $catNewsData->getmenu->id, 'slug' => createSlug($catNewsData->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                            @if (session()->get('language') === 'hindi')
                                                                {{$catNewsData['getmenu']['category_hin'] ?? "NA"}}
                                                            @elseif (session()->get('language') === 'english')
                                                                {{$catNewsData['getmenu']['category_en'] ?? "NA"}}
                                                            @elseif (session()->get('language') === 'punjabi')
                                                                {{$catNewsData['getmenu']['category_pbi'] ?? "NA"}}
                                                            @elseif (session()->get('language') === 'urdu')
                                                                {{$catNewsData['getmenu']['category_urdu'] ?? "NA"}}
                                                            @else   
                                                                {{$catNewsData['getmenu']['category_en'] ?? "NA"}}
                                                            @endif
                                                        </a>
                                                    @else
                                                    {{-- Multiple category IDs --}}
                                                    @php
                                                            $categoryIdsArray = explode(',', $catNewsData->category_id);
                                                            $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->get();
                                                    @endphp
                                                    @foreach ($categories as $key => $category)
                                                    @if ($loop->index < 3)
                                                        <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
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
                                                        </a>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>
                                                    <span class="f1-s-3">
                                                        {{carbon\Carbon::parse($catNewsData->post_date)->format('M d, Y')}}
                                                    </span>
                                                </span>
                                            </div>
                                            <a target="_blank" href="{{route('home.inner',['newsid' => $catNewsData->id , 'slug' =>  $catNewsData->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{  isset($catNewsData->thumbnail)? getThumbnail($catNewsData->thumbnail)  :   getNewsImage($catNewsData->image) }}" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        
                            @php $articleCount++ @endphp
                        
                            @if ($showAds && $key == 7 )
                                <!-- Advertisement div after 6 articles -->
                                <div class="text-center my-5">
                   
                                    @if(isset($categorycenterpAdd->image))
                            
                                    <a href="javascript:void()">
                                        <img src="{{ isset($categorycenterpAdd->image) ?  getAddImage($categorycenterpAdd->image) : asset('assets/images/ads/ad2.jpg') }}" class="img-fluid" alt="">
                                    </a>
                                    @else 

                                    @endif
                                </div>
                              
                                @php $articleCount = 0 @endphp
                                
                            @endif
                        @empty
                        <div class="text-center my-5">
         
                            <a href="javascript:void()">
                                <img src="{{ asset('assets/images/ads/ad2.jpg') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <P class="text-danger text-center"> No News Found</P>
                        @endforelse
                      
                        
                    </div>
                </div>
                <!-- Pagination -->
                <div class="flex-wr-s-c m-rl--7 p-t-15 p-b-30 justify-content-center">
                    {{ $archivePosts->links() }}
                    {{-- <a href="javascript:void()" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 pagi-active">1</a> --}}
                    {{-- <a href="javascript:void()" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7">2</a> --}}
                </div>
            </div>



            @livewire('frontend.category.categor-right-add')

        </div>
    </div>
</section>