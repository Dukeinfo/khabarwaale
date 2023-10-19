<div class="row justify-content-center p-t-40">
    <div class="col-lg-12">
        <div class="p-b-20">
            <div class="p-b-20">
                <div class="how2 how2-cl5 mb-4 flex-sb-c bg-white">
                    <h3 class="f1-m-2 cl17 tab01-title">
                       

                        @if (session()->get('language') === 'hindi')
                             आप के लिए अनुशंसित
                        @elseif (session()->get('language') === 'english')
                             Recommended for You
                        @elseif (session()->get('language') === 'punjabi')
                              ਤੁਹਾਡੇ ਲਈ ਸਿਫ਼ਾਰਿਸ਼ ਕੀਤੀ ਗਈ
                        @elseif (session()->get('language') === 'urdu')
                               {!!  'آپ کیلئے تجویز کردہ' !!}
                        @else   
                             Recommended for You

                        @endif
                    </h3>
                </div>
                <div class="row">
                    @forelse ($recmendNewsData as $recmendNews )
                    <div class="col-sm-6">
                        <!-- Item post -->
                        <div class="m-b-30">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <a target="_blank" href="{{route('home.inner',['newsid' => $recmendNews->id , 'slug' =>  $recmendNews->slug   ])}}" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{ isset($recmendNews->image)? getNewsImage($recmendNews->image)  :  asset('assets/images/post-05.jpg')}}" alt="IMG" class="img-fluid rounded">
                                    </a>
                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a target="_blank" href="{{route('home.inner',['newsid' => $recmendNews->id , 'slug' => $recmendNews->slug  ])}}" class="f1-s-5 cl2 hov-cl10 trans-03">
                                                            
                                                {!!  Str::limit($recmendNews->title, 70) ?? "NA" !!}
                                            </a>
                                        </h5>
                                        <span class="cl8">
                                            <a  target="_blank" href="{{route('home.category', ['id' => $recmendNews->getmenu->id, 'slug' =>  $recmendNews->getmenu->category_en ])}}
                                                " class="f1-s-4 cl10 hov-cl10 trans-03">
                                            
                                                    @if (session()->get('language') === 'hindi')
                                                        {!! $recmendNews['getmenu']['category_hin']  ?? "NA"  !!}
                                                    @elseif (session()->get('language') === 'english')
                                                        {!! $recmendNews['getmenu']['category_en']  ?? "NA"  !!}
                                                    @elseif (session()->get('language') === 'punjabi')
                                                        {!! $recmendNews['getmenu']['category_pbi']  ?? "NA"  !!}
                                                    @elseif (session()->get('language') === 'urdu')
                                                        {!! $recmendNews['getmenu']['category_urdu']  ?? "NA"  !!}
                                                    @else   
                                                        {{ $recmendNews->category_en  ?? "NA"}}
                                                    @endif
                                            </a>
                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>
                                            <span class="f1-s-3">
                                                {!!   carbon\Carbon::parse($recmendNews->post_date)->format('M d, Y')  ?? "NA" !!}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse
                </div>
            </div>
            
        </div>
    </div>
</div>
