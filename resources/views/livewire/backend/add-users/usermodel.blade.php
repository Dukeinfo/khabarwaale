<div class="modal fade" id="usermodel{{$record->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">User  Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                    <div class="col-md-8">
                        <h4> <span class="text-success "> User Name/Username: </span>
                            <span class="text-primary ">{{$record->name ?? 'NA' }} </span>
                            <span class="badge bg-danger" style="font-size: 20px;">{{ $record->username ?? 'NA' }}</span>
            
                        </h4>
                        <h4> <span class="text-success "> User Role: </span>
                            <span class="badge bg-primary fw-bold" style="font-size: 20px;">{{ ucwords($record->role['name'] ?? 'NA') }}</span>
            
                        </h4>
                        <h4> <span class="text-success "> User Created at : </span>
                            <span class="badge bg-dark fw-bold" style="font-size: 20px;">{{  $record->created_at->diffForHumans()  ?? 'NA'}}</span>
                        </h4>
                        <h4> <span class="text-success "> User Email: </span>
                            <span class="text-primary ">{{$record->email ?? 'NA' }} </span>
                        </h4>
                        <h4> <span class="text-success "> User Password: </span>
                            <span class="text-primary fw-bold">{{$record->user_password ?? 'NA'}}</span>
                        </h4>
            
                        <h4> <span class="text-success "> User Mobile: </span>
                            <span class="text-primary fw-bold">{{$record->mobile ?? 'NA'}}</span>
                        </h4>
                        <h4> <span class="text-success "> User websiteType: </span>
                            <span class="text-primary ">{{$record->websiteType['name'] ?? 'NA' }}</span>
                        </h4>
                        <h4> <span class="text-success "> User assignedMenus: </span>
                       
                        </h4>
                        @php
                            $assignedMenus = $record->assignedMenus;
                         @endphp
                        @forelse ($assignedMenus as $index => $assignedMenu)
                            <span class="badge bg-dark" style="font-size: 12px;"> {{ $assignedMenu->getmenu->category_en ?? 'NA'  }}</span>
                        @empty
                        {{ 'NA'}}
                        @endforelse
                        <h4> <span class="text-success "> User About: </span>
                            <span class="text-primary">{!! $record->about ?? 'NA'!!}</span>
             
                        </h4>
                    </div>
                    <div class="col-md-4 text-center d-flex flex-column justify-content-between align-items-center">
                        <!-- Your content goes here -->
                        <img src="{{ isset($record->profile_photo_path) ?  asset('storage/uploads/'. $record->profile_photo_path) : asset('no_image.jpg')}}" alt=".." class="img-size-50 img-circle img-bordered-sm" width="">
                    </div>
            </div>
        </div>
        
    </div>
    </div>
</div>

