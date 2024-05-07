<div class="col-md-10 col-lg-4">
    <div class="p-b-20">
        <div class="p-b-30">
            <div class="how2 how2-cl5 mb-4 flex-s-c bg-white">
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
            </div>
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
             
                        @forelse ($fourthCatWise_News  as $key => $cat_HinNews )
                                @if($key  == 0 )
                                    <div class="mb-3">
                                        <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                            <div class="p-b-10">
                                                <h5 class="p-b-5">
                                                    <a target="_blank" href="{{route('home.inner',['newsid' => $cat_HinNews->id , 'slug' =>  $cat_HinNews->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {!!  Str::limit($cat_HinNews->title, 85) ?? "NA" !!}
                                                        
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <span class="f1-s-3">
                                                        {!! carbon\Carbon::parse($cat_HinNews->created_at)->format('M d, Y') ?? "NA" !!}
                                                    </span>
                                                </span>
                                            </div>
                                            <a target="_blank" href="{{route('home.inner',['newsid' => $cat_HinNews->id , 'slug' =>  $cat_HinNews->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{  isset($cat_HinNews->image)? getNewsImage($cat_HinNews->image)  : asset('assets/images/post-36.jpg')}}" alt="IMG" class="img-fluid rounded" loading="lazy">
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                            <div class="flex-wr-sb-s">
                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="{{route('home.inner',['newsid' => $cat_HinNews->id , 'slug' =>  $cat_HinNews->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            {!!  Str::limit($cat_HinNews->title, 65) ?? "NA" !!}
                                                        </a>
                                                    </h5>
                                                    <span class="cl8">
                                                        <span class="f1-s-3">
                                                            {!! carbon\Carbon::parse($cat_HinNews->created_at)->format('M d, Y') ?? "NA" !!}
                                                        </span>
                                                    </span>
                                                </div>
                                                <a href="{{route('home.inner',['newsid' => $cat_HinNews->id , 'slug' =>  $cat_HinNews->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="{{  isset($cat_HinNews->thumbnail)? getThumbnail($cat_HinNews->thumbnail)  : getNewsImage($cat_HinNews->image)  }}" alt="" class="img-fluid rounded" loading="lazy">
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
           
                
 
                {{-- ================= Punjabi ===================== --}}


            {{-- ================= end urdu =================== --}}
       
                    <div class="mb-3 mt-4 text-center">
                        <a href="{{route('home.category', ['id' => $getMenus->id, 'slug' => createSlug($getMenus->category_en)  ])}}" class="btn btn-primary px-5">

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
        <!-- Subscribe -->
        {{-- @livewire('frontend.homepage.subscribe.subscribe-form') --}}
        <div class="bg10 p-rl-35 p-t-28 p-b-30 m-b-55">
            <h5 class="f1-m-5 cl0 p-b-10">
                Subscribe
            </h5>
            <p class="f1-s-1 cl0 p-b-25">
                Get all latest content delivered to your email a few times a month.
            </p>
            <form class="size-a-9 pos-relative"   wire:submit.prevent="subscribe">  
        
                @csrf
                <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" wire:model='email' name="email" placeholder="Email">
                @error('email')
                <div class="alert alert-danger">
                    {{ $message}}</span>
                @enderror
                <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03" type="submit" wire:loading.attr="disabled" >
                    <i class="fa fa-arrow-right"></i>
                </button>
            </form>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @elseif (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @else
            
            @endif
        </div>

    </div>
</div>