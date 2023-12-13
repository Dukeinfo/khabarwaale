<section class="bg-white" >
    <div class="container">
 
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
                <span class="text-uppercase cl2 p-r-20">
                    <p class="breaking_tag"><i class="fa fa-circle"></i><span class="blink">
                        @if (session()->get('language') === 'hindi')
                                 {!!  'ताजा खबर' !!}
                        @elseif (session()->get('language') === 'english')
                                {!! ' Breaking News'  !!}
                        @elseif (session()->get('language') === 'punjabi')
                                {!! 'ਤਾਜਾ ਖਬਰਾਂ'  !!}
                        @elseif (session()->get('language') === 'urdu')
                                {!! 'تازہ ترین خبر' !!}
                        @endif
                    
                    </span></p>
                </span>
                <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
                    
                    @forelse ($newsPosts  as  $key => $flashNews )

                            <span class="dis-inline-block slide100-txt-item animated visible-false" >
                                <a  target="_blank" href="{{route('home.inner',['newsid' => $flashNews->id , 'slug' =>  $flashNews->slug  ])}}
                                    " class="cl6">
                                    {!! Str::limit($flashNews->title, 80)!!}  {{$flashNews->created_at->diffForHumans()}}
                                </a>
                            </span>
    
                    @empty
                    <span class="dis-inline-block slide100-txt-item animated visible-false">
                        <a href="javascript:void()" class="cl6">
                            @switch(session()->get('language'))
                            @case('hindi')
                                {!! "कोई खबर नहीं मिली" !!}
                                @break
                            @case('punjabi')
                                {!! 'ਕੋਈ ਖ਼ਬਰ ਨਹੀਂ ਮਿਲੀ' !!}
                                @break
                            @case('urdu')
                                {!! 'کوئی خبر نہیں ملی' !!}
                                @break
                            @case('english')
                                {{" No news found"}}
                            @break
                            @default
                            {{" No news found"}}
                            @endswitch
                        </a>
                    </span>
                    @endforelse
            
                </span>
            </div>
      @livewire('frontend.homepage.search-component')

      
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger alert-dismissible">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (session('warning'))
            <div class="alert alert-warning alert-dismissible">
                {{ session('warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @else
        @endif
    </div>
</section>
