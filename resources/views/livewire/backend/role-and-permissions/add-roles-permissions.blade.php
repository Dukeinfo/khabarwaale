<div>
 

    <style type="text/css">
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Roles in Permission</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Roles in Permission</li>
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
                            <h4 class="card-title">Add Roles in Permission</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                   
                  
                                    <form wire:submit.prevent="storeROlePermission">
                                        <div class="row">
                                    
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status">Roles </label>
                                                    <select wire:model="role_id" class="form-select  @error('role_id') form-control-alt is-invalid
                                                    @enderror">
                                                        <option value="">Select</option>
                                                        @forelse ($getRoles as $role)
                                                        <option value="{{$role->id}}">{{$role->name ?? "NA"}}  </option>

                                                            
                                                        @empty
                                                            
                                                        @endforelse

                                                   </select>
                                                   @error('role_id')
                                                                    <span class="text-danger"> {{$message}}</span>
                                                   @enderror
        
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-check mb-2 form-check-primary">
                                                        <input class="form-check-input border border-dark" type="checkbox" value="" wire:model="selectAll" wire:click="selectAllToggle"  id="customckeck15" >
                                                        <label class="form-check-label" for="customckeck15">Permission All</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                            @foreach($permission_groups as $group)
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                            <div class="form-check mb-2 form-check-primary">
                                                            <input class="form-check-input  border border-dark" type="checkbox" value="" id="customckeck1" >
                                                            <label class="form-check-label" for="customckeck1">{{ $group->group_name }}</label>
                                                        </div>
                                                    </div>
                                                </div><!--  // End col 3  -->
                                   
                                   
                                              <div class="col-9">
                                                            @php
                                                                 $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                                            @endphp

                                                     @foreach($permissions as $permission)
                                                        <div class="form-group">

                                                            <div class="form-check mb-2 form-check-primary">
                                                                 <input class="form-check-input border border-dark" name="permission[]" wire:model="selectedPermissions.{{ $permission->id }}"  type="checkbox" value="{{ $permission->id }}" id="customckeck{{ $permission->id }}"  >
                                                                 <label class="form-check-label" for="customckeck1">{{ $permission->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                  <br>
                                             </div><!--  // End col 9  -->
                                           </div>  <!-- // End Row  -->
                                           @endforeach
                                
                                     
                             

                                            
                                       
                                
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit"  wire:loading.attr="disabled"  class="btn btn-primary">Save Data</button>
                                                    <div wire:loading wire:target="storeROlePermission">
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
                            <h4 class="card-title">All Roles Permission</h4>
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
                                            <th>Role name </th>
                                            <th>Permission </th>                                        
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                      
                                         @forelse ( $getRoles as $key => $record )
                                      
                                         <tr>
                                            <td> {{ $key+1}}</td>

                                            <td>{{$record->name ?? 'NA' }} <br>
                                            <td    width="70%"> 
                                                
                                                @foreach($record->permissions as $perm)
                                                
                                                
                                                <span class="badge bg-danger p-1 mt-1"  style="font-size:18px;">  {{ $perm->name?? "NA"  }} </span>

                                                @endforeach
                                                
                                        
                                            </td>
                     


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



