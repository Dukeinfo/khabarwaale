    
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                            <h3 class="f1-m-2 cl17 tab01-title">
                      

                                {{GoogleTranslate::trans('Top News', app()->getLocale()) ?? "NA"}}

                            </h3>
                        </div>
                        {{-- start Top News --}}

                    @forelse ($topNewsData as  $key =>$topNews )
                        
                   @if($key == 0)
                        <div class="card border-0 shadow-sm mb-3"  wire:loading.class="shimmer" wire:poll>
                            <div class="card-body">
                                <div class="p-b-20">
                                    <h5 class="p-b-5">
                                        <a target="_blank" href="{{route('home.inner',['newsid' => $topNews->id , 'slug' => GoogleTranslate::trans($topNews->slug, app()->getLocale()) ])}}"  target="_blank" class="f1-m-3 cl2 hov-cl10 trans-03 font-weight-bold">
                                        
                                           {!! GoogleTranslate::trans( Str::limit($topNews->title, 85), app()->getLocale()) !!}

                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a href="{{route('home.category', ['id' => $topNews->getmenu->id, 'slug' => createSlug($topNews->getmenu->category_en)])}}
                                            " target="_blank"  class="f1-s-4 cl10 hov-cl10 trans-03">
                                        
                                            {!!GoogleTranslate::trans($topNews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}
                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            
                                            {!! GoogleTranslate::trans( carbon\Carbon::parse($topNews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}

                                        </span>
                                    </span>
                                </div>
                                <a href="javascript:void();" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ isset($topNews->image)? getNewsImage($topNews->image)  :  asset('assets/images/news/n1.jpg')}}" alt="IMG" class="img-fluid rounded">
                                </a>
                            </div>
                        </div>
                    @else 
                       
                        {{-- end Top News --}}

                        <div class="card border-0 shadow-sm mb-3" wire:poll>
                            <div class="card-body">
                                <div class="flex-wr-sb-s">
                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a target="_blank" href="{{route('home.inner',['newsid' => $topNews->id , 'slug' => $topNews->slug ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                           {!! GoogleTranslate::trans( Str::limit($topNews->title, 80), app()->getLocale()) !!}

                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a target="_blank" href="{{route('home.inner',['newsid' => $topNews->id , 'slug' => $topNews->slug ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                {!!GoogleTranslate::trans($topNews['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}

                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!! GoogleTranslate::trans( carbon\Carbon::parse($topNews->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}

                                            </span>
                                        </span>
                                    </div>
                                    <a target="_blank" href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{ isset($topNews->image)? getNewsImage($topNews->image)  :  asset('assets/images/post-06.jpg')}}" alt="" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @empty
                        
                        @endforelse
                        {{-- end Top News --}}
       
                        <div class="text-center">
                            <p class="text-uppercase text-center small pb-2">{{GoogleTranslate::trans('Advertisement', app()->getLocale()) ?? "NA"}} </p>
                            <a  target="_blank" href="javascript:void()">
                                <img src="{{asset('assets/images/ads/ad2.jpg')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>