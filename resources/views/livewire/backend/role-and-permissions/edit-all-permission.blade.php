<div>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Update Permissions</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Update Permissions</li>
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
                            <h4 class="card-title">Update Permissions</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to Update or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                   
                  
                                    <form wire:submit.prevent="UpdatePermission">
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
                                                        <option value="">Select</option>
                                                        <option value="news">News  </option>
                                                        <option value="banner">Banner </option>
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
                                                    <button type="submit" wire:target="UpdatePermission" wire:loading.attr="disabled"  class="btn btn-primary">Save Data</button>
                                                    <div wire:loading wire:target="UpdatePermission">
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



