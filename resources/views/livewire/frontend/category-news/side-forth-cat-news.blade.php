<div class="col-md-10 col-lg-4">
    <div class="p-b-20">
        @forelse ($getMenus  as $menu )
        @if($menu->sort_id == 4 )
            {{--  =============================== 4th  right side Category wise news    ===============================--}}

            {{-- world  --}}
        <div class="p-b-30">
            <div class="how2 how2-cl5 mb-4 flex-s-c bg-white">
                <h3 class="f1-m-2 cl17 tab01-title">

                  {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

                </h3>
            </div>

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    @forelse ($fourthCatWiseNews as $index2 =>  $fourthCatnews)
                        @if($index2 == 0)
            
                    <div class="mb-3">
                        <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                            <div class="p-b-10">
                                <h5 class="p-b-5">
                                    <a href="{{route('home.inner',['newsid' => $fourthCatnews->id , 'slug' => $fourthCatnews->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">

                                        {!! GoogleTranslate::trans( Str::limit($fourthCatnews->title, 90), app()->getLocale()) ?? "NA" !!}
                                    </a>
                                </h5>
                                <span class="cl8">
                                    <span class="f1-s-3">
                                        
                                        {!! GoogleTranslate::trans( carbon\Carbon::parse($fourthCatnews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}
                                    </span>
                                </span>
                            </div>
                            <a href="{{route('home.inner',['newsid' => $fourthCatnews->id , 'slug' => $fourthCatnews->slug ])}}" class="wrap-pic-w hov1 trans-03">
                                <img src="{{  isset($fourthCatnews->image)? getNewsImage($fourthCatnews->image)  : asset('assets/images/post-36.jpg')}}" alt="IMG" class="img-fluid rounded">
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="mb-3">
                        <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                            <div class="flex-wr-sb-s">
                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="{{route('home.inner',['newsid' => $fourthCatnews->id , 'slug' => $fourthCatnews->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                        {!! GoogleTranslate::trans( Str::limit($fourthCatnews->title, 75), app()->getLocale()) ?? "NA" !!}

                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <span class="f1-s-3">
                                            
                                        {!!GoogleTranslate::trans($fourthCatnews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}
                                        </span>
                                    </span>
                                </div>
                                <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{  isset($fourthCatnews->image)? getThumbnail($fourthCatnews->thumbnail)  : asset('assets/images/post-01.jpg')}}" alt="" class="img-fluid rounded">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @empty
                        <p class="text-center">
                            Record Not Found
                        </p> 
                    @endforelse
                    <div class="mb-3 mt-4 text-center">
                        <a href="javascript:void();" class="btn btn-primary px-5">
                            {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}
                            
                           </a>
                    </div>
                </div>
            </div>
        </div>
            {{-- world  --}}


        @endif
        @empty
        
        @endforelse
        <!-- Subscribe -->
        <div class="bg10 p-rl-35 p-t-28 p-b-30 m-b-55">
            <h5 class="f1-m-5 cl0 p-b-10">
                Subscribe
            </h5>
            <p class="f1-s-1 cl0 p-b-25">
                Get all latest content delivered to your email a few times a month.
            </p>
            <form class="size-a-9 pos-relative">
                <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="Email">
                <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
                    <i class="fa fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</div>