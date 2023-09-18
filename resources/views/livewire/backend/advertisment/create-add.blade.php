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
                                                              <option value="{{ $route->getName() }}"  class="form-control">{{ str_replace('_' , ' ',$routeName)}}
                                                                </option>
               
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @error('page_name') <span class="error">{{ $message }}</span> @enderror
                                                
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="location">Location</label>
                                                    <select wire:model="location" class="form-control" id="location">
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
                                                    <input wire:model="from_date" type="date" class="form-control" id="from_date">
                                                    @error('from_date') <span class="error">{{ $message }}</span> @enderror
                                               
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="to_date">To Date</label>
                                                    <input wire:model="to_date" type="date" class="form-control" id="to_date">
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
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive </option>
                                                   </select>
                                                   @error('status') <span class="error">{{ $message }}</span> @enderror
        
                                                </div>
                                            </div>
                                        
                                   
                                      
                                        
                                
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" wire:target="CreateUsers" wire:loading.attr="disabled"  class="btn btn-primary">Save Data</button>
                                                    <div wire:loading wire:target="CreateUsers">
                                                        <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">
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
                            <h4 class="card-title">Manage users</h4>
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
                                            <th>Add image</th>
                                            <th> Name </th>
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
                                                
                                                <img src="{{getThumbnail($record->thumbnail) ?? ''}}" alt=".." class="img-size-50 img-circle img-bordered-sm" width="50">
                                            
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/addpic/'. $record->image_add)}}" alt=".." class="img-size-50 img-circle img-bordered-sm" width="50">

                                            </td>
                                            <td>{{ ucwords(str_replace('home.','',$record->page_name)) ?? 'NA' }}</td>
                                  
                                            <td> {{$record->location ?? 'NA' }}</td>

                                            <td>
                                                @if($record->status  == "Active")
                                                <a href="javascript:void(0)" wire:click="inactive({{$record->id}})">
                                                    <span class="badge bg-success" > Active</span>
                                                </a> 
                                            @else
                                                <a href="javascript:void(0)" wire:click="active({{$record->id}})">
                                                    <span class="badge bg-danger" >  Inactive </span>
                                                </a> 
                                            </td>

                                           @endif
                                                <td>   
                                                <a  href="javascript:void(0)" wire:click="edit({{$record->id}})" class="text-success me-2" title="Edit"  wire:target="edit({{ $record->id }})"  wire:loading.attr="disabled"><i class="fa fa-edit fa-fw"></i></a>
                                                <a href="javascript:void(0)" class="text-danger me-2" title="Delete" wire:click="delete({{ $record->id }})" wire:target="delete({{ $record->id }})"  wire:loading.attr="disabled"><i class="fa fa-times fa-fw fa-lg"></i></a>
                                            </td>
                                        </tr>
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



