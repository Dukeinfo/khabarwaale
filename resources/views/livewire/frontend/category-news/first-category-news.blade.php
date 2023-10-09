@forelse ($getMenus  as $menu )
@if($menu->sort_id == 1)
<div class="p-b-20">
    <div class="how2 how2-cl5 mb-4 flex-sb-c bg-white">
        <h3 class="f1-m-2 cl17 tab01-title">
            {{GoogleTranslate::trans($menu->category_en  , app()->getLocale()) ?? "NA"}}

        </h3>
        <a href="javascript:void();" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
        
      {{GoogleTranslate::trans("View all" , app()->getLocale()) ?? "NA"}}
             
            <i class="fs-12 m-l-5 fa fa-caret-right"></i>
        </a>
    </div>

    <div class="row" >
  
        @forelse ($catWiseNews as $index => $catwise )
            @if( $index == 0 )
                <div class="col-sm-6" >
                    <!-- Item post -->
                    <div class="m-b-30">
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <a href="javascript:void();" class="wrap-pic-w hov1 trans-03">

                                    <img src="{{ isset($catwise->image)? getNewsImage($catwise->image)  : asset('assets/images/post-05.jpg')}}" alt="IMG" class="img-fluid rounded">
                                </a>
                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="javascript:void();" class="f1-s-5 cl2 hov-cl10 trans-03">
                                        
                                            {!! GoogleTranslate::trans( Str::limit($catwise->title, 85), app()->getLocale()) ?? "NA" !!}
                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            
                                            {!!GoogleTranslate::trans($catwise['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}
                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            {!! GoogleTranslate::trans( carbon\Carbon::parse($catwise->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else 
            @endif
        @empty
            
        @endforelse
        <div class="col-sm-6">
            @forelse ( $catWiseNews as $key =>  $catWise)
                @if( $key > 0 )
                    <div class="card border-0 shadow-sm mb-3" >
                        <div class="card-body">
                            <div class="flex-wr-sb-s">
                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="javascript:void();" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            {!! GoogleTranslate::trans( Str::limit($catWise->title, 65), app()->getLocale()) ?? "NA" !!}

                                        </a>
                                    </h5>
                                    <span class="cl8">
                                        <a href="javascript:void();" class="f1-s-4 cl10 hov-cl10 trans-03">
                                            {!!GoogleTranslate::trans($catWise['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}

                                        </a>
                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>
                                        <span class="f1-s-3">
                                            {!! GoogleTranslate::trans( carbon\Carbon::parse($catWise->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}

                                        </span>
                                    </span>
                                </div>
                                <a href="javascript:void()" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ isset($catWise->thumbnail)? getThumbnail($catWise->thumbnail)  : asset('assets/images/post-06.jpg')}}" alt="" class="img-fluid rounded">
                                </a>
                            </div>
                        </div>
                    </div>
            
                    @else 
                @endif
            @empty
                
            @endforelse
   

        </div>
    </div>
</div>
 @endif
@empty
@endforelse