
    {{-- Chandigarh  --}}
    <div class="col-sm-6 p-b-25">
        <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
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
            <a href="{{route('home.category', ['id' => $getMenus->id, 'slug' => createSlug($getMenus->category_en)  ])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
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
        <!-- Main Item post -->
                                    {{--=================== Hindi =================== --}}

                @forelse ($third_Cat_Wise_News  as $key => $cat3_News )
                    @if($key  == 0 )
                    
                        <div class="mb-3">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat3_News->id , 'slug' =>  $cat3_News->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{  isset($cat3_News->image)? getNewsImage($cat3_News->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded">
                                    </a>
                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat3_News->id , 'slug' =>  $cat3_News->slug ])}}"class="f1-s-5 cl2 hov-cl10 trans-03">
                                                {!!  Str::limit($cat3_News->title, 80) ?? "NA" !!}
                                            </a>
                                        </h5>
                                        <span class="cl8">
                       
                                            @if (strpos($cat3_News->category_id, ',') === false)
                                            {{-- Single category ID --}}
                                                <a  target="_blank"  href="{{ route('home.category', ['id' => $cat3_News->getmenu->id, 'slug' => createSlug($cat3_News->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    @if (session()->get('language') === 'hindi')
                                                        {{$cat3_News['getmenu']['category_hin'] ?? "NA"}}:
                                                    @elseif (session()->get('language') === 'english')
                                                        {{$cat3_News['getmenu']['category_en'] ?? "NA"}}:
                                                    @elseif (session()->get('language') === 'punjabi')
                                                        {{$cat3_News['getmenu']['category_pbi'] ?? "NA"}}:
                                                    @elseif (session()->get('language') === 'urdu')
                                                        {{$cat3_News['getmenu']['category_urdu'] ?? "NA"}}:
                                                    @else   
                                                        {{$cat3_News['getmenu']['category_en'] ?? "NA"}}:
                                                    @endif
                                                </a>
                                            @else
                                            {{-- Multiple category IDs --}}
                                            @php
                                                    $categoryIdsArray = explode(',', $cat3_News->category_id);
                                                    $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id' ,4)->get();
                                            @endphp
                                            @foreach ($categories as $category)
                                                <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    @if (session()->get('language') === 'hindi')
                                                        {{ $category->category_hin ?? "NA" }}:
                                                    @elseif (session()->get('language') === 'english')
                                                        {{ $category->category_en ?? "NA" }}:
                                                    @elseif (session()->get('language') === 'punjabi')
                                                        {{ $category->category_pbi ?? "NA" }}:
                                                    @elseif (session()->get('language') === 'urdu')
                                                        {{$category->category_urdu ?? "NA" }}:
                                                    @else   
                                                        {{ $category->category_en ?? "NA" }}:
                                                    @endif
                                                </a>
                                            @endforeach
                                            @endif
                                                
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!! carbon\Carbon::parse($cat3_News->post_date)->format('M d, Y') ?? "NA" !!}
    
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
                                            <a target="_blank"  href="{{route('home.inner',['newsid' => $cat3_News->id , 'slug' =>  $cat3_News->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                {!!  Str::limit($cat3_News->title, 65) ?? "NA" !!}
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            @if (strpos($cat3_News->category_id, ',') === false)
                                            {{-- Single category ID --}}
                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $cat3_News->getmenu->id, 'slug' => createSlug($cat3_News->getmenu['category_en'])]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                @if (session()->get('language') === 'hindi')
                                                    {{$cat3_News['getmenu']['category_hin'] ?? "NA"}}:
                                                @elseif (session()->get('language') === 'english')
                                                    {{$cat3_News['getmenu']['category_en'] ?? "NA"}}:
                                                @elseif (session()->get('language') === 'punjabi')
                                                    {{$cat3_News['getmenu']['category_pbi'] ?? "NA"}}:
                                                @elseif (session()->get('language') === 'urdu')
                                                    {{$cat3_News['getmenu']['category_urdu'] ?? "NA"}}:
                                                @else   
                                                    {{$cat3_News['getmenu']['category_en'] ?? "NA"}}:
                                                @endif
                                            </a>
                                        @else
                                          {{-- Multiple category IDs --}}
                                        @php
                                                $categoryIdsArray = explode(',', $cat3_News->category_id);
                                                $categories = \App\Models\Category::whereIn('id', $categoryIdsArray)->where('sort_id' ,4)->get();
                                        @endphp
                                        @foreach ($categories as $category)
                                            <a  target="_blank"  href="{{ route('home.category', ['id' => $category->id, 'slug' => createSlug($category->category_en)]) }}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                @if (session()->get('language') === 'hindi')
                                                    {{ $category->category_hin ?? "NA" }}:
                                                @elseif (session()->get('language') === 'english')
                                                    {{ $category->category_en ?? "NA" }}:
                                                @elseif (session()->get('language') === 'punjabi')
                                                    {{ $category->category_pbi ?? "NA" }}:
                                                @elseif (session()->get('language') === 'urdu')
                                                    {{$category->category_urdu ?? "NA" }}:
                                                @else   
                                                    {{ $category->category_en ?? "NA" }}:
                                                @endif
                                            </a>
                                        @endforeach
                                        @endif
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!! carbon\Carbon::parse($cat3_News->post_date)->format('M d, Y') ?? "NA" !!}
                                            </span>
                                        </span>
                                    </div>
                                    <a target="_blank"   href="{{route('home.inner',['newsid' => $cat3_News->id , 'slug' =>  $cat3_News->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{  isset($cat3_News->thumbnail)? getThumbnail($cat3_News->thumbnail)  :getNewsImage($cat3_News->image)  }}" alt="" class="img-fluid rounded">
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
       
                                {{--=================== english =================== --}}


    </div>
    
    