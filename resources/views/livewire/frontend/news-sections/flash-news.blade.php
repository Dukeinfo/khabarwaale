<section class="bg-white"  wire:loading.class="shimmer" >
    <div class="container">
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
                <span class="text-uppercase cl2 p-r-20">
                    <p class="breaking_tag"><i class="fa fa-circle"></i><span class="blink">{{GoogleTranslate::trans('Breaking News', app()->getLocale()) ?? "NA"}}
                    </span>
                    </p>
                </span>

                <span   class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
                  @forelse ($this->flashNewsData  as  $key => $flashNews )
                    <span class="dis-inline-block slide100-txt-item animated visible-false" >
                        <a href="javascript:void()" class="cl6">
                           ({{$key+1}})  {!!  GoogleTranslate::trans( Str::limit($flashNews->title, 60), app()->getLocale()) !!}
                        </a>
                    </span>
                  @empty
                  <span class="dis-inline-block slide100-txt-item animated visible-false">
                    <a href="javascript:void()" class="cl6">
                     {{"NA"}}
                    </a>
                </span>
                  @endforelse
                
             
                </span>
            </div>
            <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
                <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        </div>
    </div>
</section>