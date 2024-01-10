<section class="p-t-30">
    <div class="container">
        <div class="row">
   

            @forelse ($homeTopAdd as  $catTopAdd)
            <div class="col-lg-4 text-center">
                {{-- <p class="text-uppercase text-center small pb-2">                
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
                </p> --}}
                @if(isset($catTopAdd->image))
                <a href="{{isset($catTopAdd->image_add) ?get_add_Image($catTopAdd->image_add) : $catTopAdd->link_add }}" target="_blank">
                    <img src="{{  getAddImage($catTopAdd->image)}}" class="img-fluid" alt="Advertisement">
                </a>
                @else
                @endif
            </div>
        @empty

        @endforelse
        </div>
    </div>
</section>