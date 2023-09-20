<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage News</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Create News</li>
                                <li class="breadcrumb-item active">News</li>
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
                            <h4 class="card-title">Add News</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                         
                   
                     
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Manage News</h4>
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
                                                @if($record->image_add)
                                                <img src="{{ asset('storage/addpic/'. $record->image_add)}}" alt=".." class="img-size-50 img-circle img-bordered-sm" width="50">
                                                
                                                @else
                                                <a href="{{$record->link_add?? '#'}}" target="_blank"> Link add</a>
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



