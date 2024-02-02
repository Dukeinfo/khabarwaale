<div class="col-lg-4">
    <div class="row">

  

        @forelse ($rightAdvertisements as $advertisement)
        <div class="col-lg-12 mb-4" wire:poll>
            <div class="card bg-white shadow-sm text-center border-0">
                <div class="card-body">
   
                    @if(isset($advertisement->image))
                        <a href="{{$advertisement->link_add ?? "#"}}">
                            <img src="{{  getAddImage($advertisement->image) }}" class="img-fluid" alt="">
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