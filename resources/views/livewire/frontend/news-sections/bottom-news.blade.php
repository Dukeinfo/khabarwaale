<section class="p-t-50">
    <div class="container">
        <div class="row">
            {{-- narional  --}}
            <div class="col-sm-4 p-b-25">
                <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                        @if (session()->get('language') === 'hindi')
                                    {{ $get_bottom1_Menus->category_hin  ?? "NA"}}
                        @elseif (session()->get('language') === 'english')
                                    {{ $get_bottom1_Menus->category_en  ?? "NA"}}
                        @elseif (session()->get('language') === 'punjabi')
                                    {{ $get_bottom1_Menus->category_pbi ?? "NA"}}
                        @elseif (session()->get('language') === 'urdu')
                                    {{ $get_bottom1_Menus->category_urdu ?? "NA"}}
                        @else   
                                    {{ $get_bottom1_Menus->category_en  ?? "NA"}}
                        @endif
                    </h3>
                    <a href="{{route('home.category', ['id' => $get_bottom1_Menus->id, 'slug' => createSlug($get_bottom1_Menus->category_en)  ])}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                        @if (session()->get('language') === 'hindi')
                                सभी को देखें
                       @elseif (session()->get('language') === 'english')
                                View All
                       @elseif (session()->get('language') === 'punjabi')
                                ਸਭ ਦੇਖੋ
                       @elseif (session()->get('language') === 'urdu')
                            سب دیکھیں     
                        @else   

                        @endif
                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                    </a>
                </div>
                <!-- Main Item post -->

          
        
                @if (session()->get('language') == "hindi" )
                    @forelse ($five_CatWise_HindiNews  as $key => $cat_Hin_News )
                        @if($key  == 0 )
                            <div class="mb-3">
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_Hin_News->id , 'slug' =>  $cat_Hin_News->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{  isset($cat_Hin_News->image)? getNewsImage($cat_Hin_News->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded">
                                        </a>
                                        <div class="p-t-20">
                                            <h5 class="p-b-5">
                                                <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_Hin_News->id , 'slug' =>  $cat_Hin_News->slug  ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                                    {!!  Str::limit($cat_Hin_News->title, 85) ?? "NA" !!}
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a  target="_blank" href="{{ route('home.category', ['id' => $cat_Hin_News->getmenu->id, 'slug' => createSlug($cat_Hin_News->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    {!!  $cat_Hin_News['getmenu']['category_hin'] ?? "NA"  !!}
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {!! carbon\Carbon::parse($cat_Hin_News->post_date)->format('M d, Y') ?? "NA" !!}
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
                                                <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_Hin_News->id , 'slug' =>  $cat_Hin_News->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {!!  Str::limit($cat_Hin_News->title, 60) ?? "NA" !!}
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a target="_blank"  href="{{ route('home.category', ['id' => $cat_Hin_News->getmenu->id, 'slug' => createSlug($cat_Hin_News->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    {!!  $cat_Hin_News['getmenu']['category_hin'] ?? "NA"  !!}
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {!! carbon\Carbon::parse($cat_Hin_News->post_date)->format('M d, Y') ?? "NA" !!}
                                                </span>
                                            </span>
                                        </div>
                                        <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat_Hin_News->id , 'slug' =>  $cat_Hin_News->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{   isset($cat_Hin_News->thumbnail)? getThumbnail($cat_Hin_News->thumbnail)  : asset('assets/images/post-11.jpg')}}" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                    @endforelse
                @endif
                {{--======================== english news ======================== --}}

                 @if (session()->get('language') == "english" )

                 @forelse ($five_CatWise_EngNews  as $key => $cat_eng_News )
                 @if($key  == 0 )
                     <div class="mb-3">
                         <div class="card border-0 shadow-sm mb-3">
                             <div class="card-body">
                                 <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_eng_News->id , 'slug' =>  $cat_eng_News->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                     <img src="{{  isset($cat_eng_News->image)? getNewsImage($cat_eng_News->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded">
                                 </a>
                                 <div class="p-t-20">
                                     <h5 class="p-b-5">
                                         <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_eng_News->id , 'slug' =>  $cat_eng_News->slug  ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                             {!!  Str::limit($cat_eng_News->title, 85) ?? "NA" !!}
                                         </a>
                                     </h5>
                                     <span class="cl8">
                                         <a  target="_blank" href="{{ route('home.category', ['id' => $cat_eng_News->getmenu->id, 'slug' => createSlug($cat_eng_News->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                             {!!  $cat_eng_News['getmenu']['category_hin'] ?? "NA"  !!}
                                         </a>
                                         <span class="f1-s-3 m-rl-3">
                                             -
                                         </span>
                                         <span class="f1-s-3">
                                             {!! carbon\Carbon::parse($cat_eng_News->post_date)->format('M d, Y') ?? "NA" !!}
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
                                         <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_eng_News->id , 'slug' =>  $cat_eng_News->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                             {!!  Str::limit($cat_eng_News->title, 60) ?? "NA" !!}
                                         </a>
                                     </h5>
                                     <span class="cl8">
                                         <a target="_blank"  href="{{ route('home.category', ['id' => $cat_eng_News->getmenu->id, 'slug' => createSlug($cat_eng_News->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                             {!!  $cat_eng_News['getmenu']['category_hin'] ?? "NA"  !!}
                                         </a>
                                         <span class="f1-s-3 m-rl-3">
                                             -
                                         </span>
                                         <span class="f1-s-3">
                                             {!! carbon\Carbon::parse($cat_eng_News->post_date)->format('M d, Y') ?? "NA" !!}
                                         </span>
                                     </span>
                                 </div>
                                 <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat_eng_News->id , 'slug' =>  $cat_eng_News->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                     <img src="{{   isset($cat_eng_News->thumbnail)? getThumbnail($cat_eng_News->thumbnail)  : asset('assets/images/post-11.jpg')}}" alt="" class="img-fluid rounded">
                                 </a>
                             </div>
                         </div>
                     </div>
                 @endif
             @empty
             @endforelse
                @endif
                {{--======================== punjabi news ======================== --}}

                 @if (session()->get('language') == "punjabi" )

                 @forelse ($five_CatWise_PbiNews  as $key => $cat_Pbi_News )
                 @if($key  == 0 )
                     <div class="mb-3">
                         <div class="card border-0 shadow-sm mb-3">
                             <div class="card-body">
                                 <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_Pbi_News->id , 'slug' =>  $cat_Pbi_News->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                     <img src="{{  isset($cat_Pbi_News->image)? getNewsImage($cat_Pbi_News->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded">
                                 </a>
                                 <div class="p-t-20">
                                     <h5 class="p-b-5">
                                         <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_Pbi_News->id , 'slug' =>  $cat_Pbi_News->slug  ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                             {!!  Str::limit($cat_Pbi_News->title, 85) ?? "NA" !!}
                                         </a>
                                     </h5>
                                     <span class="cl8">
                                         <a  target="_blank" href="{{ route('home.category', ['id' => $cat_Pbi_News->getmenu->id, 'slug' => createSlug($cat_Pbi_News->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                             {!!  $cat_Pbi_News['getmenu']['category_hin'] ?? "NA"  !!}
                                         </a>
                                         <span class="f1-s-3 m-rl-3">
                                             -
                                         </span>
                                         <span class="f1-s-3">
                                             {!! carbon\Carbon::parse($cat_Pbi_News->post_date)->format('M d, Y') ?? "NA" !!}
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
                                         <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_Pbi_News->id , 'slug' =>  $cat_Pbi_News->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                             {!!  Str::limit($cat_Pbi_News->title, 60) ?? "NA" !!}
                                         </a>
                                     </h5>
                                     <span class="cl8">
                                         <a target="_blank"  href="{{ route('home.category', ['id' => $cat_Pbi_News->getmenu->id, 'slug' => createSlug($cat_Pbi_News->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                             {!!  $cat_Pbi_News['getmenu']['category_hin'] ?? "NA"  !!}
                                         </a>
                                         <span class="f1-s-3 m-rl-3">
                                             -
                                         </span>
                                         <span class="f1-s-3">
                                             {!! carbon\Carbon::parse($cat_Pbi_News->post_date)->format('M d, Y') ?? "NA" !!}
                                         </span>
                                     </span>
                                 </div>
                                 <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat_Pbi_News->id , 'slug' =>  $cat_Pbi_News->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                     <img src="{{   isset($cat_Pbi_News->thumbnail)? getThumbnail($cat_Pbi_News->thumbnail)  : asset('assets/images/post-11.jpg')}}" alt="" class="img-fluid rounded">
                                 </a>
                             </div>
                         </div>
                     </div>
                 @endif
             @empty
             @endforelse
                @endif
                {{--======================== urdu news ======================== --}}
                 @if (session()->get('language') == "urdu" )
                    @forelse ($five_CatWise_UrduNews  as $key => $cat_urdu_News )
                        @if($key  == 0 )
                            <div class="mb-3">
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_urdu_News->id , 'slug' =>  $cat_urdu_News->slug  ])}}" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{  isset($cat_urdu_News->image)? getNewsImage($cat_urdu_News->image)  : asset('assets/images/post-10.jpg')}}" alt="IMG" class="img-fluid rounded">
                                        </a>
                                        <div class="p-t-20">
                                            <h5 class="p-b-5">
                                                <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_urdu_News->id , 'slug' =>  $cat_urdu_News->slug  ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                                    {!!  Str::limit($cat_urdu_News->title, 85) ?? "NA" !!}
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a  target="_blank" href="{{ route('home.category', ['id' => $cat_urdu_News->getmenu->id, 'slug' => createSlug($cat_urdu_News->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    {!!  $cat_urdu_News['getmenu']['category_urdu'] ?? "NA"  !!}
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {!! carbon\Carbon::parse($cat_urdu_News->post_date)->format('M d, Y') ?? "NA" !!}
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
                                                <a target="_blank"  href="{{route('home.inner',['newsid' => $cat_urdu_News->id , 'slug' =>  $cat_urdu_News->slug  ])}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {!!  Str::limit($cat_urdu_News->title, 60) ?? "NA" !!}
                                                </a>
                                            </h5>
                                            <span class="cl8">
                                                <a target="_blank"  href="{{ route('home.category', ['id' => $cat_urdu_News->getmenu->id, 'slug' => createSlug($cat_urdu_News->getmenu->category_en)  ])}}" class="f1-s-4 cl10 hov-cl10 trans-03">
                                                    {!!  $cat_urdu_News['getmenu']['category_urdu'] ?? "NA"  !!}
                                                </a>
                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>
                                                <span class="f1-s-3">
                                                    {!! carbon\Carbon::parse($cat_urdu_News->post_date)->format('M d, Y') ?? "NA" !!}
                                                </span>
                                            </span>
                                        </div>
                                        <a  target="_blank"  href="{{route('home.inner',['newsid' => $cat_urdu_News->id , 'slug' =>  $cat_urdu_News->slug  ])}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{   isset($cat_urdu_News->thumbnail)? getThumbnail($cat_urdu_News->thumbnail)  : asset('assets/images/post-11.jpg')}}" alt="" class="img-fluid rounded">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                    @endforelse
                @endif
                {{--======================== end urdu news ======================== --}}


            </div>
            {{-- end narional  --}}

            {{-- worlds --}}
            @livewire('frontend.news-sections.bottomnews2')
            {{-- end worlds --}}

            {{-- sporta --}}
            @livewire('frontend.news-sections.bottomnews3')
            {{-- end sporta --}}

        </div>
    </div>
</section>