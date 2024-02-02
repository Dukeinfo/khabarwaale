<section class="p-t-30 p-b-40">
    <div class="container">
        <div class="row">
            @forelse ($innerTopAdd as  $innerTop)
            <div class="col-lg-4 text-center">

                @if(isset($innerTop->image))
                <a href="{{$innerTop->link_add ?? "#"}}">
                    <img src="{{  getAddImage($innerTop->image)}}" class="img-fluid" alt="Advertisement">
                </a>
                @else
                @endif
            </div>
        @empty
            
        @endforelse

           
        </div>
    </div>
</section>