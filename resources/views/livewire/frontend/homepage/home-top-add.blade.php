

@if (Route::currentRouteName() === 'home.archive_page')

<section class="p-t-30">
    <div class="container">
        <div class="row">
            @forelse ($homeTopArchiveAdd as  $topAdd)
            <div class="col-lg-4 text-center">
                @if(isset($topAdd->image))
                <a href="{{isset($topAdd->image_add) ? get_add_Image($topAdd->image_add) : $topAdd->link_add }}" target="_blank">
                    <img src="{{  getAddImage($topAdd->image)}}" class="img-fluid" alt="Advertisement" loading="lazy">
                </a>
                @else
                @endif
            </div>
        @empty
        @endforelse
        </div>
    </div>
</section>

@else
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
@endif

