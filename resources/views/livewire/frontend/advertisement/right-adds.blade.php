<div class="col-lg-4">
    <div class="row">

  

        @forelse ($rightAdvertisements as $advertisement)
        <div class="col-lg-12 mb-4" >
            <div class="card bg-white shadow-sm text-center border-0">
                <div class="card-body">
   
                    @if(isset($advertisement->image))
                        <a href="{{isset($advertisement->image_add) ? get_add_Image($advertisement->image_add) : $advertisement->link_add }}" target="_blank">
                            <img src="{{  getAddImage($advertisement->image) }}" class="img-fluid" alt="" loading="lazy" >
                        </a>
                    @endif
                </div>
            </div>
        </div>
        @empty

        @endforelse

    
        <!-- Editor's Desk -->
        @livewire('frontend.advertisement.editor-profile')
        
        @livewire('frontend.homepage.subscribe.subscribe-form')


    </div>
</div>