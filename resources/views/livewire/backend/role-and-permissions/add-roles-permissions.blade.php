<div>

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
                   
                  
                                    <form wire:submit.prevent="addPermission">
                                        <div class="row">
                                    
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status">Roles</label>
                                                    <select wire:model="group_name" class="form-select">
                                                        <option value="">Select</option>
                                                        @forelse ($getRoles as $role)
                                                        <option value="{{$role->id}}">{{$role->name ?? "NA"}}  </option>

                                                            
                                                        @empty
                                                            
                                                        @endforelse

                                                        
                                                   
                                                        
                                             
                                                   </select>
                                                   @error('group_name ') <span class="error">{{ $message }}</span> @enderror

        
                                                </div>
                                            </div>

                                            @foreach($permission_groups as $group)
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                            <div class="form-check mb-2 form-check-primary">
                                                            <input class="form-check-input" type="checkbox" value="" id="customckeck1" >
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
                                                                 <input class="form-check-input" name="permission[]" type="checkbox" value="{{ $permission->id }}" id="customckeck{{ $permission->id }}"  >
                                                                 <label class="form-check-label" for="customckeck1">{{ $permission->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                  <br>
                                             </div><!--  // End col 9  -->
                                           </div>  <!-- // End Row  -->
                                           @endforeach
                                
                                     
                             

                                            
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
            
     
            <!-- end row -->


            
        </div>
        <!-- container-fluid -->
    </div>
</div>



