<div class="modal fade" id="exampleModal{{$record->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add  Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h4> <span class="text-success "> Add  page_name: </span>
                <span class="text-primary "> {{$record->page_name?? 'NA' }} </span>
            </h4>
            <h4> <span class="text-success ">location </span>
                <span class="badge bg-dark p-1"> {{ $record->location ?? 'NA'  }}</span>
           </h4>
         
            <h4> <span class="text-success">Main Add image :</span> </h4>
            
            <img src="{{getAddImage($record->image)}}" alt="..." class="img-fluid">

             <h4> <span class="text-success">News Link add :</span> </h4>
         
             @if($record->image_add)
             <img src="{{ asset('storage/image/'. $record->image_add)}}" alt=".." class="img-fluid " >
             
             @else
             <a href="{{$record->link_add?? '#'}}" target="_blank"> Link add</a>
             @endif
        
        
 
        </div>

    </div>
    </div>
</div>