<section class="p-t-30">
    <div class="container">
        <div class="row">
            @forelse ($categoryTopAdd as  $catTopAdd)
                <div class="col-lg-4 text-center">
          
                    @if(isset($catTopAdd->image))
                    <a href="{{$catTopAdd->link_add ?? "#"}}">
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