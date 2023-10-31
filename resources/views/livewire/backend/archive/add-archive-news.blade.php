<div>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Archive</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Add Archive</li>
                                <li class="breadcrumb-item active">Users</li>
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
                            <h4 class="card-title">Add Archive</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                   
                  
                                    <form wire:submit.prevent="Createarchive">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="getwebsite_type"> Archive Date </label>
                                                    <input type="date" wire:model='archiveDate' class="form-control" >
                                                </div>
                                                @error('archiveDate') <span class="error">{{ $message }}</span> @enderror

                                            </div>
                            
                                
                                            {{-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select wire:model="status" class="form-select">
                                                        <option value="">Select</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive </option>
                                                   </select>
                                                   @error('status') <span class="error">{{ $message }}</span> @enderror
        
                                                </div>
                                            </div> --}}

                                            
                                        </div>
                                
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" wire:target="Createarchive" wire:loading.attr="disabled"  class="btn btn-primary">Set Date</button>
                                                    <div wire:loading wire:target="Createarchive">
                                                        <i class="fas fa-1x fa-sync-alt fa-spin"></i>

                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                    
                       
                            
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
                            <h4 class="card-title">Manage Archive</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                   
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable--">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <td>Date</td>
                                            <th>Status</th>    
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                      
                                         @forelse ( $records as $key => $record )
                                     
                                         <tr>
                                            <td> {{ $key+1}}</td>              
                                            <td>
                                                {{ \Carbon\Carbon::parse($record->archived_at)->format('F j, Y') }}
                                            </td>
                                            <td>
                                                @if($record->status  == "Active")
                                                    <a href="javascript:void(0)" >
                                                        <span class="badge bg-success p-2" > Active</span>
                                                    </a> 
                                                 @else
                                                    <a href="javascript:void(0)" >
                                                        <span class="badge bg-danger p-2" >  In-active </span>
                                                    </a> 
                                                @endif
                                            </td>
                                                <td>   
                                                    @if($record->status   == 'Active')         
                                                    <button class="btn btn-sm btn-info" title="In-Active" wire:click="inactive({{$record->id}})" wire:target="unarchiveNewsPost({{ $record->id }})"  wire:loading.attr="disabled">
                                                        <i class="fa fa-archive fa-fw"></i>
                                                    </button>
                                                    @else 
                                                    <button class="btn btn-sm btn-dark" title="Active" wire:click="active({{$record->id}})" wire:target="archiveNewsPost({{ $record->id }})"  wire:loading.attr="disabled">
                                                        <i class="fa fa-archive fa-fw"></i>
                                                    </button>
                                                    @endif
                                                <button   wire:click="edit({{$record->id}})" class="btn btn-sm btn-primary" title="Edit"  wire:target="edit({{ $record->id }})"  wire:loading.attr="disabled">
                                                    <i class="fa fa-edit fa-fw"></i>
                                                </button>
                                                <button   class="btn btn-sm btn-danger" title="Delete" wire:click="delete({{ $record->id }})" wire:target="delete({{ $record->id }})"  wire:loading.attr="disabled">
                                                    <i class="fa fa-times fa-fw fa-lg"></i>
                                                </button>
                                            </td>
                                        </tr>
                                         @empty
                                            <tr>
                                                <td colspan="4"> Record Not Found</td>                                           
                                            </tr>
                                             @endforelse 
                                                     {{-- ========================= trash data =========================== --}}
                                                     @if(isset($trashdata) & count($trashdata) > 0 )
                                                     <tr> <th colspan="7">
                                                        <h3>  Trash data </h3>
                                                         </th></tr>
                                                     @forelse ($trashdata  as $keys => $trash )
                                                     <tr>
                                           
            
                                                        {{-- <td> {{ $key+1}}</td> --}}
                                                              
                                                        <td>
                                                         

                                                            {{ $trash->archived_at  ?? "NA"}}

                                                        </td>
                                                  
                                                        <td>
                                                            @if($trash->status  == "Active")
                                                                <a href="javascript:void(0)" >
                                                                    <span class="badge bg-success p-2" > Archived</span>
                                                                </a> 
                                                             @else
                                                                <a href="javascript:void(0)" >
                                                                    <span class="badge bg-danger p-2" > un Archived </span>
                                                                </a> 
                                                            @endif
                
                                                        </td>
                                              
            
                                                            <td colspan="2" class="text-center">   
                                                    
                                                                <button class="btn btn-sm btn-danger" wire:click="restore({{ $trash->id }})" wire:target="restore({{ $trash->id }})"  wire:loading.attr="disabled">
                                                                    Restore
                                                                </button>
                                                                <button class="btn btn-sm btn-warning" onclick="confirm('Are you sure you want to Peramanetly remove  this News ?') || event.stopImmediatePropagation()" wire:click="paramDelete({{ $trash->id }})" wire:target="paramDelete({{ $trash->id }})"  wire:loading.attr="disabled">
                                                                        Peramanet Delete
                                                                </button>

                                                        </td>
                                                    </tr>
                                                     @empty
                                                                           
                                                     @endforelse       
                                                     @endif

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



