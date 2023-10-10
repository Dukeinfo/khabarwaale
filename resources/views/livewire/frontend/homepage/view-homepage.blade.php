<div>

{{-- flash news  --}}
@livewire('frontend.news-sections.flash-news') 
{{-- end flash news  --}}
<section class="p-t-30"  >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2"> {{GoogleTranslate::trans('Advertisement', app()->getLocale())}}</p>
                <a href="javascript:void()">
                    <img src="{{asset('assets')}}/images/ads/h-ad1.png" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
  


 {{-- latest top and side bar  --}}
 <section class="p-t-30" >
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">

                    {{-- latest nes  --}}
                    @livewire('frontend.news-sections.latest-news' ,['Lazy' => true])
                    {{-- end latest news  --}}
                    <div class="col-lg-12 mb-4">
                        <div class="card bg-white shadow-sm text-center border-0">
                            <div class="card-body">
                                                {{GoogleTranslate::trans('Advertisement', app()->getLocale()) ?? "NA"}}
                                                <p class="text-uppercase text-center small pb-2"> </p>
                                <a href="javascript:void()">
                                    <img src="{{asset('assets/images/ads/v-ad1.gif')}}" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main news -->
        
            {{-- top news  --}}
            @livewire('frontend.news-sections.top-news', ['Lazy' => true])
            {{-- top news  --}}


          {{-- side add and stay connected  --}}
            @include('livewire.frontend.advertisement.right-adds' ,['Lazy' => true])
          {{-- side add and stay connected  --}}


        </div>
    </div>
</section>
 {{-- latest top nes and side bar   --}}
<section class="" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2">{{GoogleTranslate::trans('Advertisement', app()->getLocale()) ?? "NA"}}</p>
                <a href="javascript:void()">
                    <img src="{{asset('assets')}}/images/ads/ad3.jpg" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
                {{--  =============================== Category wise news  Punjab id =1   ===============================--}}
<section class="p-t-70"   >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="p-b-20">
                     {{-- Punjab  --}}
                     @livewire('frontend.category-news.first-category-news', ['Lazy' => true])
                    {{-- Punjab  --}}

            
                    {{-- second and 3rd  --}}
                        @livewire('frontend.category-news.second-category-news' ,['Lazy' => true])
                    {{-- second and 3rd  --}}


                </div>
            </div>
          
                {{-- side barth category   --}}
                @livewire('frontend.category-news.side-forth-cat-news', ['Lazy' => true])
                {{-- side barth category   --}}



        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2">{{GoogleTranslate::trans('Advertisement', app()->getLocale()) ?? "NA"}}</p>
                <a href="javascript:void()">
                    <img src="{{asset('assets/images/ads/ad4.jpg')}}" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</section>

   

@livewire('frontend.news-sections.bottom-news')


</div>