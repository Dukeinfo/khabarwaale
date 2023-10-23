<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Advertisments</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Create Add</li>
                                <li class="breadcrumb-item active">Advertisment</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Add Users</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                       <!-- Add a Livewire form -->

                                <!-- First Row -->
                               
                                    <form wire:submit.prevent="CreateAdd">
                                        
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="page_name">Page Name</label>
                                                    <select name="page_name" wire:model="page_name" id="page_name"  class="form-control">
                                                     <option value="" >Select page</option>          
                                                            @foreach(Route::getRoutes() as $route)
                                                             @if (str_starts_with($route->getName(), 'home.') )
                                                                @php
                                                                    $routeName   = ucwords(str_replace('home.','',$route->getName() )  )
                                                                @endphp
                                                                <option value="{{  $routeName }}"  class="form-control">{{ str_replace('_' , ' ',$routeName)}}  </option>
               
                                                            @endif
                                                            @endforeach
                                                        {{-- <option value="Home">Home</option>
                                                        <option value="Others">Others</option> --}}
                                                    </select>
                                                    @error('page_name') <span class="error">{{ $message }}</span> @enderror
                                                
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="location">Location</label>
                                                    <select wire:model="location" class="form-control" id="location">
                                                       <option value="">Select Location </option>
                                                        @forelse ( $get_add_location as  $addLocation)
                                                        
                                                        <option value="{{$addLocation->name}}">{{$addLocation->name}}</option>

                                                        @empty
                                                            
                                                        @endforelse
                                                    </select>
                                                   @error('location') <span class="error">{{ $message }}</span> @enderror

                                                </div>
                                                <div class="col-md-4">
                                                    <label for="add_image">Enter  Image</label>
                                                    <input wire:model="image" type="file"  class="form-control" id="add_image">
                                                    @error('image') <span class="error">{{ $message }}</span> @enderror
                                               
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <label for="type">Type</label>
                                                    <select name="type"  wire:model.live="type" class="form-control col-md-3" >
                                                        <option value="">Select</option>
                                                        <option value="link">Link</option>
                                                        <option value="image">Image</option>
                                                    </select>
                                                    @error('type') <span class="error">{{ $message }}</span> @enderror

                                                </div>
                                                
                                                @if($type ==  'link')  
                                                <div class="col-md-4">
                                                    <label for="link_add"> Link Add</label>
                                                    <input wire:model="link_add" type="text" placeholder="https://example.com"  class="form-control" id="link_add">
                                                </div>
                                               
                                                @elseif($type ==  'image')  
                                              
                                                <div class="col-md-4">
                                                     <label for="image_add"> Image Add</label>
                                                     <input wire:model="image_add" type="file"  class="form-control" id="image_add">
                                                </div>
                                                @else

                                                @endif 
                                                <div class="col-md-4">
                                                    <label for="from_date">From Date</label>
                                                    <input wire:model="from_date" type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"  class="form-control" id="from_date">
                                                    @error('from_date') <span class="error">{{ $message }}</span> @enderror
                                               
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="to_date">To Date</label>
                                                    <input wire:model="to_date" type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control" id="to_date">
                                                    @error('to_date') <span class="error">{{ $message }}</span> @enderror
                                              
                                                </div>
                                           
                                        
                                                <div class="col-md-4">
                                                    <label for="post_month">Post Month</label>
                                                    <select wire:model="post_month" class="form-control" id="post_month">
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                    </select>
                                                    @error('post_month') <span class="error">{{ $message }}</span> @enderror

                                                </div>
                                                <div class="col-md-4">
                                                    <label for="sort_id">Sort ID</label>
                                                    <input wire:model="sort_id" type="number" placeholder="sort no" class="form-control" id="sort_id">
                                                    @error('sort_id') <span class="error">{{ $message }}</span> @enderror
                                              
                                                </div>
                                            
                                                <div class="col-md-4">
                                                    <label for="status">Status</label>
                                                    <select wire:model="status" class="form-select">
                                                        <option value="">Select</option>
                                                        <option value="Yes">Active</option>
                                                        <option value="No">Inactive </option>
                                                   </select>
                                                   @error('status') <span class="error">{{ $message }}</span> @enderror
        
                                                </div>
                                            </div>
                                        
                                   
                                      
                                        
                                
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" wire:target="CreateAdd" wire:loading.attr="disabled"  class="btn btn-primary">Save Data</button>
                                                    <div wire:loading wire:target="CreateAdd">
                                                        <i class="fas fa-1x fa-sync-alt fa-spin"></i>

                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                
                                
                    
                                <!-- Third Row -->
                          
                    
                                <!-- Fourth Row -->
                     
                    
                            
                            <!--form starts-->
                     
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Manage Add</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                            <div class="col-md-3 float-end">
                                <div class="form-group">
    
                                    <div class="mb-3">
                                        <label class="form-label">Search</label>
                                        <input type="search" class="form-control"  wire:model.live="search" placeholder="Search...">
                                         @error('Search') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable--">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                        
                                            <th> image</th>
                                            <th>Add Type</th>
                                            <th> Date </th>

                                            <th>Page  Name </th>
                                            <th> location </th>
                                            <th>Status</th>    
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                      
                                         @forelse ( $records as $key => $record )
                                         @if($record->role_id != 1)
                                         <tr>
                                            <td> {{ $key+1}}</td>
                                            <td>   
                                                
                                                <img src="{{getThumbnail($record->thumbnail) ?? ''}}" alt=".." class="img-size-50  img-bordered-sm rounded" width="100" height="100">
                                            
                                            </td>
                                            <td>
                                                @if($record->image_add)
                                                <img src="{{ asset('storage/image/'. $record->image_add)}}" alt=".." class="img-size-50  img-bordered-sm" width="100">
                                                
                                                @else
                                                <a href="{{$record->link_add?? '#'}}" target="_blank"> Link add</a>
                                                @endif
                                            </td>
                                            <td> 
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
                                            @else
                                                <span class="text-danger fw-bold">(Expired )</span>
                                            @endif
                                            
                                            </td>
                                            <td>{{ ucwords(str_replace('home.','',$record->page_name)) ?? 'NA' }}</td>
                                  
                                            <td> {{$record->location ?? 'NA' }}</td>

                                            <td>
                                                @if($record->status  == "Yes")
                                                <a href="javascript:void(0)" wire:click="inactive({{$record->id}})">
                                                    <span class="badge bg-success" > Active</span>
                                                </a> 
                                            @else
                                                <a href="javascript:void(0)" wire:click="active({{$record->id}})">
                                                    <span class="badge bg-danger" >  Inactive </span>
                                                </a> 
                                                @endif
                                            </td>

                                                <td>   
                                         
                                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{$record->id}}">
                                                        <i class="fa fa-eye fa-fw"></i></button>
                                                    <button class="btn btn-sm btn-primary"  wire:click="edit({{$record->id}})"  wire:target="edit({{ $record->id }})"  wire:loading.attr="disabled">
                                                        <i class="fa fa-edit fa-fw"></i>
                                                    </button>
                                                
                                                    <button class="btn btn-sm btn-danger"  wire:click="delete({{ $record->id }})" wire:target="delete({{ $record->id }})"  wire:loading.attr="disabled">

                                                        <i class="fa fa-times fa-fw fa-lg"></i>
                                                    </button>
                                        
                                            </td>
                                        </tr>
                                        @include('livewire.backend.advertisment.add-model')

                                        @endif
                                         @empty
                                            <tr>
                                                <td colspan="4"> Record Not Found</td>                                           
                                            </tr>
                                             @endforelse 

                                    

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            
        </div>
        <!-- container-fluid -->
    </div>
</div>



