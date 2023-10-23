<div class="col-md-10 col-lg-4 p-b-30">
    <div class="p-rl-0-sr991">
        <div class="row">
            
            @forelse ($innerrightAdd as $advertisement)
            <div class="col-lg-12 mb-4" wire:poll>
                <div class="card bg-white shadow-sm text-center border-0">
                    <div class="card-body">
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



            <!-- Subscribe -->
            @livewire('frontend.homepage.subscribe.subscribe-form')
            
        </div>

        <!-- Archive -->
        @livewire('frontend.archive.view-archive')

    </div>
</div>