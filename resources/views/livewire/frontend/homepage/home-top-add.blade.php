<section class="p-t-30">
    <div class="container">
        <div class="row">
            @forelse ($homeTopAdd as  $catTopAdd)
            <div class="col-lg-4 text-center">

                @if(isset($catTopAdd->image))
                <a href="{{isset($catTopAdd->image_add) ?get_add_Image($catTopAdd->image_add) : $catTopAdd->link_add }}" target="_blank">
                    <img src="{{  getAddImage($catTopAdd->image)}}" class="img-fluid" alt="Advertisement" loading="lazy">
                </a>
                @else
                @endif
            </div>
        @empty
        @endforelse
        </div>
    </div>
</section>