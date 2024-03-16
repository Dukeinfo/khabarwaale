<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                @if(isset($homeBottomAdd))
                <a href="{{$homeBottomAdd->link_add ?? '#'}}">
                    <img src="{{ getAddImage($homeBottomAdd->image)  }}" class="img-fluid" alt="" loading="lazy">
                </a>
                @else
                @endif
            </div>
        </div>
    </div>
</section>