<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
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