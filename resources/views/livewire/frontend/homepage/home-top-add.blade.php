<section class="p-t-30">
    <div class="container">
        <div class="row">
            @forelse ( $homeTopAdd as  $topadd)
            <div class="col-lg-4 text-center">
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
                @if(isset($topadd->image))
                    <a href="{{$topadd->link_add ?? "#"}}">
                        <img src="{{  getAddImage($topadd->image)}}" class="img-fluid" alt="Advertisement">
                    </a>
                @else
 
                 @endif
            </div>

            @empty
                
            @endforelse
        </div>
    </div>
</section>