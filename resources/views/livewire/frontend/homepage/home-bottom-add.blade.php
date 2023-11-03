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
                        @if (session()->get('language') == "hindi" )
                            <p class="text-center text-danger"> कोई विज्ञापन नहीं</p>
                        @endif
                        @if (session()->get('language') == "english" )
                        <p class="text-center text-danger">    Advertisement </p>
                        @endif
                        @if (session()->get('language') == "punjabi" )
                        <p class="text-center text-danger">   ਕੋਈ ਇਸ਼ਤਿਹਾਰ ਨਹੀਂ </p>
                        @endif
                        @if (session()->get('language') == "urdu" )
                        <p class="text-center text-danger">  کوئی اشتہار نہیں۔  </p>
                        @endif
                @endif
            </div>
        </div>
    </div>
</section>