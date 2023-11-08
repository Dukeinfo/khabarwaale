<div>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">All Permissions</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Add Permissions</li>
                                <li class="breadcrumb-item active">Permissions</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">

                    <select style="display:none;" id="multSelect">
                        <option value="te_1" data-search="arsenal">Arsenal</option>
                        <option value="te_3" data-search="Tottenham Hotspur Spurs">Spurs</option>
                        <option value="te_3" data-search="Manchester City">Man City</option>
                    
                    </select>
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Add Permissions</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                   
                  
                                    <form wire:submit.prevent="addPermission">
                                        <div class="row">
                                    
                                      
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input wire:model.live="name" type="text" placeholder="Name" class="form-control" id="name">
                                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                
                                   
                                
                                 

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status">Group name</label>
                                                    <select wire:model="group_name" class="form-select">
                                                        <option> Select One Category </option>
                                                        

                                                        <option value="category">Category </option>
                                                        <option value="news">News  </option>
                                                        <option value="user"> User </option>
                                                        <option value="banner">Banner </option>
                                                        <option value="photo">Photo </option>
                                                        <option value="video">Video  </option>
                                                        <option value="live">Live  </option>
                                                        <option value="seo">Seo  </option>
                                                        <option value="admin">Admin Setting  </option>
                                                        <option value="role">Role and Permission </option> 
                                                   </select>
                                                   @error('group_name ') <span class="error">{{ $message }}</span> @enderror

        
                                                </div>
                                            </div>
                                
                                     
                             

                                            
                                        </div>
                                
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" wire:target="addPermission" wire:loading.attr="disabled"  class="btn btn-primary">Save Data</button>
                                                    <div wire:loading wire:target="addPermission">
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
                            <h4 class="card-title">Manage Permissions</h4>
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
                                            <th>Permission Name </th>
                                            <th>Group Name </th>                                        
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                      
                                         @forelse ( $permissions as $key => $record )
                                      
                                         <tr>
                                            <td> {{ $key+1}}</td>

                                            <td>{{$record->name ?? 'NA' }} <br>
                                            <td>  <span class="badge bg-primary p-1"  style="font-size:20px;">  {{ $record->group_name?? "NA"  }} </span></td>

                                                
                                        
                     
                                                <td>   
                                                   
                                                <button   wire:click="edit({{$record->id}})" class="btn btn-sm btn-primary" title="Edit"  wire:target="edit({{ $record->id }})"  wire:loading.attr="disabled"><i class="fa fa-edit fa-fw"></i></button>
                                                <button   class="btn btn-sm btn-danger" title="Delete" wire:click="delete({{ $record->id }})" wire:target="delete({{ $record->id }})"  wire:loading.attr="disabled"><i class="fa fa-times fa-fw fa-lg"></i></button>
                                            </td>



                                            {{-- @include('livewire.backend.add-users.usermodel') --}}
                                        </tr>

                                      

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



