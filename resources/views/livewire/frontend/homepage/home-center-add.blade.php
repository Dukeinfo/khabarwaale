<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text-uppercase text-center small pb-2">
                    @switch(session()->get('language'))
                    @case('hindi')
                        विज्ञापन
                        @break
                    @case('english')
                        Advertisement
                        @break
                    @case('punjabi')
                        ਇਸ਼ਤਿਹਾਰ
                        @break
                    @case('urdu')
                        اشتہار
                        @break
                    @default
                        Advertisement
                    @endswitch 
                </p>
                @if(isset($homeCenterLongAdd))
                
                <a href="{{$homeCenterLongAdd->link_add ?? '#'}}">
                    <img src="{{ getAddImage($homeCenterLongAdd->image)  }}" class="img-fluid" alt="">
                </a>
                @else
    
                @endif
            </div>
        </div>
    </div>
</section>