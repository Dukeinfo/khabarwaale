<div class="col-lg-12 mb-4">
    <div class="how2 how2-cl5 flex-sb-c mb-4 bg-white">
        <h3 class="f1-m-2 cl17 tab01-title">
            {{GoogleTranslate::trans('Latest News', app()->getLocale())}}
        </h3>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            {{--start  Latest News --}}
            @forelse ($latestNewsData as $news )
            <div class="mb-3">
                <div class="border border-top-0 border-left-0 border-right-0 pb-3">
                    <h5 class="p-b-5">
                        <a target="_blank" href="{{route('home.inner',['newsid' => $news->id , 'slug' =>  GoogleTranslate::trans($news->slug, app()->getLocale())])}}" target="_blank" class="f1-s-5 cl3 hov-cl10 trans-03">
                            
                            <span class="text-danger mr-1"> 
                                {!!GoogleTranslate::trans($news['getmenu']['category_en'], app()->getLocale()) ?? "NA"  !!}:
                            </span>
                            {!! GoogleTranslate::trans( Str::limit($news->title, 80), app()->getLocale()) !!}
                           
                        </a>
                    </h5>
                    <span class="cl8">
                        <span class="f1-s-3">
                            {!! GoogleTranslate::trans( carbon\Carbon::parse($news->post_date)->format('M d, Y'), app()->getLocale()) ?? "NA" !!}
                        </span>
                    </span>
                </div>
            </div>
            @empty
            @endforelse
         
            {{--end Latest News --}}


            <div class="text-center">
                <a href="javascript:void()" target="_blank" class="btn btn-primary px-5">  {{GoogleTranslate::trans('View All', app()->getLocale())}}</a>
            </div>
        </div>
    </div>
</div>