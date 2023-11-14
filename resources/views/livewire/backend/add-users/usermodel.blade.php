<div class="modal fade" id="usermodel{{$record->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">User  Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h4> <span class="text-success "> User name: </span>
                <span class="text-primary ">{{$record->name ?? 'NA' }} </span>
                <span class="badge bg-primary" style="font-size: 20px;">  {{ ucwords($record->role['name']  ?? "NA") }} </span>
            </h4>
            
 
            <h4> <span class="text-success "> User Email: </span>
                <span class="text-primary ">{{$record->email ?? 'NA' }} </span>
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
                <span class="badge bg-dark" style="font-size: 20px;"> {{ $assignedMenu->getmenu->category_en ?? 'NA'  }}</span>
            @empty
            {{ 'NA'}}
            @endforelse
        </div>

    </div>
    </div>
</div>

