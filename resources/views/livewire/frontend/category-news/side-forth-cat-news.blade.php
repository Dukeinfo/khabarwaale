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
                    @if (session()->get('language') == "hindi" )
                        @forelse ($fourthCatWise_HindiNews  as $key => $cat_HinNews )
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
                                                        {!! carbon\Carbon::parse($cat_HinNews->post_date)->format('M d, Y') ?? "NA" !!}
                                                    </span>
                                                </span>
                                            </div>
                                            <a target="_blank" href="{{route('home.inner',['newsid' => $cat_HinNews->id , 'slug' =>  $cat_HinNews->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                                <img src="{{  isset($cat_HinNews->image)? getNewsImage($cat_HinNews->image)  : asset('assets/images/post-36.jpg')}}" alt="IMG" class="img-fluid rounded">
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
                                                            {!! carbon\Carbon::parse($cat_HinNews->post_date)->format('M d, Y') ?? "NA" !!}
                                                        </span>
                                                    </span>
                                                </div>
                                                <a href="{{route('home.inner',['newsid' => $cat_HinNews->id , 'slug' =>  $cat_HinNews->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="{{  isset($cat_HinNews->thumbnail)? getThumbnail($cat_HinNews->thumbnail)  : asset('assets/images/post-01.jpg')}}" alt="" class="img-fluid rounded">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                        @empty
                        @endforelse
                    @endif
                
                {{-- ================= English ===================== --}}
                @if (session()->get('language') == "english" )
                    @forelse ($fourthCatWise_EngNews  as $key => $cat_Eng_News )
                            @if($key  == 0 )
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <div class="p-b-10">
                                            <h5 class="p-b-5">
                                                <a target="_blank" href="{{route('home.inner',['newsid' => $cat_Eng_News->id , 'slug' =>  $cat_Eng_News->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {!!  Str::limit($cat_Eng_News->title, 85) ?? "NA" !!}
                                                    
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <span class="f1-s-3">
                                                    {!! carbon\Carbon::parse($cat_Eng_News->post_date)->format('M d, Y') ?? "NA" !!}
                                                </span>
                                            </span>
                                        </div>
                                        <a target="_blank" href="{{route('home.inner',['newsid' => $cat_Eng_News->id , 'slug' =>  $cat_Eng_News->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{  isset($cat_Eng_News->image)? getNewsImage($cat_Eng_News->image)  : asset('assets/images/post-36.jpg')}}" alt="IMG" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="mb-3">
                                    <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                        <div class="flex-wr-sb-s">
                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a  target="_blank" href="{{route('home.inner',['newsid' => $cat_Eng_News->id , 'slug' =>  $cat_Eng_News->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {!!  Str::limit($cat_Eng_News->title, 65) ?? "NA" !!}
                                                    </a>
                                                </h5>
                                                <span class="cl8">
                                                    <span class="f1-s-3">
                                                        {!! carbon\Carbon::parse($cat_Eng_News->post_date)->format('M d, Y') ?? "NA" !!}
                                                    </span>
                                                </span>
                                            </div>
                                            <a  target="_blank" href="{{route('home.inner',['newsid' => $cat_Eng_News->id , 'slug' =>  $cat_Eng_News->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{  isset($cat_Eng_News->thumbnail)? getThumbnail($cat_Eng_News->thumbnail)  : asset('assets/images/post-01.jpg')}}" alt="" class="img-fluid rounded">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                    @empty
                    @endforelse
                @endif
                {{-- ================= Punjabi ===================== --}}
                @if (session()->get('language') == "punjabi" )
                    @forelse ($fourthCatWise_PbiNews  as $key => $cat_pbi_News )
                        @if($key  == 0 )
                            <div class="mb-3">
                                <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                    <div class="p-b-10">
                                        <h5 class="p-b-5">
                                            <a target="_blank" href="{{route('home.inner',['newsid' => $cat_pbi_News->id , 'slug' =>  $cat_pbi_News->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                {!!  Str::limit($cat_pbi_News->title, 85) ?? "NA" !!}
                                                
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <span class="f1-s-3">
                                                {!! carbon\Carbon::parse($cat_pbi_News->post_date)->format('M d, Y') ?? "NA" !!}
                                            </span>
                                        </span>
                                    </div>
                                    <a target="_blank" href="{{route('home.inner',['newsid' => $cat_pbi_News->id , 'slug' =>  $cat_pbi_News->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{  isset($cat_pbi_News->image)? getNewsImage($cat_pbi_News->image)  : asset('assets/images/post-36.jpg')}}" alt="IMG" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="mb-3">
                                <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_pbi_News->id , 'slug' =>  $cat_pbi_News->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {!!  Str::limit($cat_pbi_News->title, 65) ?? "NA" !!}
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <span class="f1-s-3">
                                                    {!! carbon\Carbon::parse($cat_pbi_News->post_date)->format('M d, Y') ?? "NA" !!}
                                                </span>
                                            </span>
                                        </div>
                                        <a  target="_blank" href="{{route('home.inner',['newsid' => $cat_pbi_News->id , 'slug' =>  $cat_pbi_News->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{  isset($cat_pbi_News->thumbnail)? getThumbnail($cat_pbi_News->thumbnail)  : asset('assets/images/post-01.jpg')}}" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @empty
                    @endforelse
                @endif
                {{-- ================= Urdu ===================== --}}
                @if (session()->get('language') == "urdu" )
                    @forelse ($fourthCatWise_UrduNews  as $key => $cat_urdu_News )
                        @if($key  == 0 )
                            <div class="mb-3">
                                <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                    <div class="p-b-10">
                                        <h5 class="p-b-5">
                                            <a target="_blank" href="{{route('home.inner',['newsid' => $cat_urdu_News->id , 'slug' =>  $cat_urdu_News->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                {!!  Str::limit($cat_urdu_News->title, 85) ?? "NA" !!}
                                                
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <span class="f1-s-3">
                                                {!! carbon\Carbon::parse($cat_urdu_News->post_date)->format('M d, Y') ?? "NA" !!}
                                            </span>
                                        </span>
                                    </div>
                                    <a target="_blank" href="{{route('home.inner',['newsid' => $cat_urdu_News->id , 'slug' =>  $cat_urdu_News->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{  isset($cat_urdu_News->image)? getNewsImage($cat_urdu_News->image)  : asset('assets/images/post-36.jpg')}}" alt="IMG" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="mb-3">
                                <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                                    <div class="flex-wr-sb-s">
                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a target="_blank" href="{{route('home.inner',['newsid' => $cat_urdu_News->id , 'slug' =>  $cat_urdu_News->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {!!  Str::limit($cat_urdu_News->title, 65) ?? "NA" !!}
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <span class="f1-s-3">
                                                    {!! carbon\Carbon::parse($cat_urdu_News->post_date)->format('M d, Y') ?? "NA" !!}
                                                </span>
                                            </span>
                                        </div>
                                        <a target="_blank" href="{{route('home.inner',['newsid' => $cat_urdu_News->id , 'slug' =>  $cat_urdu_News->slug ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{  isset($cat_urdu_News->thumbnail)? getThumbnail($cat_urdu_News->thumbnail)  : asset('assets/images/post-01.jpg')}}" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                    @endforelse
                @endif
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
            @endif
        </div>

    </div>
</div>