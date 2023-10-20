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
              

                @if(isset($homeBottomAdd))
                
                <a href="{{$homeBottomAdd->link_add ?? '#'}}">
                    <img src="{{ getAddImage($homeBottomAdd->image)  }}" class="img-fluid" alt="">
                </a>
                @else
                {{-- <a href="javascript:void()">
                    <img src="{{asset('assets/images/ads/ad4.jpg')}}" class="img-fluid" alt="">
                </a> --}}
                @endif
            </div>
        </div>
    </div>
</section>