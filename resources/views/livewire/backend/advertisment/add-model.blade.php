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
             <h4> <span class="text-success">Link   :</span>             

             <a href="{{$record->link_add?? '#'}}" target="_blank"> Link add</a>  </h4> 
             @endif
        
             <h4> <span class="text-success">Expiry  :</span>               
                <h4><span class="text-success">Expiry Date:</span>
                    @php
                    $formattedFromDate = isset($record->from_date) ? date('M d, Y', strtotime($record->from_date)) : 'NA';
                    $formattedToDate = isset($record->to_date) ? date('M d, Y', strtotime($record->to_date)) : 'NA';
                
                    $fromDate = isset($record->from_date) ? new DateTime($formattedFromDate) : null;
                    $toDate = isset($record->to_date) ? new DateTime($formattedToDate) : null;
                
                    if ($fromDate !== null && $toDate !== null) {
                        if ($fromDate < $toDate) {
                            $interval = $fromDate->diff($toDate);
                            $days = $interval->format("%a");
                            $daysLeft = max(0, $days);
                        } else {
                            $daysLeft = 0; // Handle case where from_date is later than to_date
                        }
                    } else {
                        $daysLeft = 0; // Default to 0 days left if either date is missing
                    }
                @endphp
                
                {{ $formattedFromDate }} to {{ $formattedToDate }}
                @if ($daysLeft > 0)
                    <span class="text-warning fw-bold">
                        (for {{ $daysLeft }} day{{ $daysLeft != 1 ? 's' : '' }} )
                    </span>
                @elseif($daysLeft < 0 )
                    <span class="text-danger fw-bold">(Expired )</span>
                {{-- @elseif($daysLeft <= 0 )
                    <span class="text-danger fw-bold">(It will expire today)</span> --}}

                @endif

                
                
                    </h4>
                    
        
        </h4>
        
 
        </div>

    </div>
    </div>
</div>