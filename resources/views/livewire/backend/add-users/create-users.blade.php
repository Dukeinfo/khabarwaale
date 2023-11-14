<div>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Add Users</li>
                                <li class="breadcrumb-item active">Users</li>
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
                            <h4 class="card-title">Add Users</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                   
                  
                                    <form wire:submit.prevent="CreateUsers">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="getwebsite_type">Wesite type </label>
                                                   <select name="getwebsite_type" wire:model.live="website_type_id" id="getwebsite_type" class="form-control">
                                                    <option value=""> Select type</option>
                                                    @forelse ($getwebsite_type as $type )
                                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @empty
                                                    @endforelse
                                                   </select>
                                                </div>
                                                @error('website_type_id') <span class="error">{{ $message }}</span> @enderror

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="role_id">Role</label>
                                                    <select wire:model.live="role_id" class="form-control" id="role_id">
                                                        <option  value="">Select Role</option>
                                                        @forelse ($getRoles as $role )
                                                            {{-- @if($role->id != 1) --}}
                                                                <option value="{{$role->id}}"> {{ ucwords($role->name)}}</option>
                                                                {{-- @endif --}}
                                                            @empty
                                                            
                                                        @endforelse
                                                        @error('role_id') <span class="error">{{ $message }}</span> @enderror

                                                        <!-- Add more role options as needed -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input wire:model.live="name" type="text" placeholder="Name" class="form-control" id="name">
                                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="username">User name</label>
                                                    <input wire:model.live="username"  placeholder="Username" type="text" class="form-control" id="uname" autocomplete="nope" >
                                                    @error('username') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                
                             
                                
                                      
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input wire:model.live="email" placeholder="email"  type="email" class="form-control" id="email" >
                                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                  
                                     

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="form-label">Password</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" name="password" wire:model="password"  autocomplete="current-password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                                </div>
                                            </div>
                                
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <input wire:model="password_confirmation" type="password" placeholder="Confirm Password" class="form-control" id="password_confirmation">
                                                    @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                        
                                
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name_hin">Name (Hindi)</label>
                                                    <input wire:model.live="name_hin" type="text" class="form-control" placeholder="Name (Hindi)" id="name_hin">
                                                    @error('name_hin') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name_pbi">Name (Punjabi)</label>
                                                    <input wire:model.live="name_pbi" type="text" placeholder="Name (Punjabi)" class="form-control" id="name_pbi">
                                                    @error('name_pbi') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                    
                                
                                    
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name_urdu">Name (Urdu)</label>
                                                    <input wire:model.live="name_urdu" type="text" placeholder="Name (Urdu)" class="form-control" id="name_urdu">
                                                    @error('name_urdu') <span class="error">{{ $message }}</span> @enderror
                                               
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <input wire:model.live="mobile" type="text" placeholder="Mobile" class="form-control" id="mobile">
                                                    @error('mobile') <span class="error">{{ $message }}</span> @enderror
                                                
                                                </div>
                                            </div>
                                
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="menus">Menus</label>
                                                    <div>
                                                        @foreach($getCategory as $category)
                                                        <label for="menu_{{$category->id}}">
                                                            <input wire:model="menus.{{$category->id}}" type="checkbox" id="menu_{{$category->id}}" value="{{$category->category_en}}">
                                                            {{$category->category_en}}
                                                        </label>
                                                    @endforeach
                                                        <!-- Add more menu items as needed -->
                                                    </div>
                                                    @error('menus') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                                
                                            </div>
                                  
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="about">About</label>
                                                    <input wire:model.live="about" type="text" placeholder="About" class="form-control" id="about">
                                                    @error('about') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                
                                         
                                        
                                            {{-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input wire:model="city" type="text" class="form-control" id="city">
                                                </div>
                                            </div>
                                
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input wire:model="state" type="text" class="form-control" id="state">
                                                </div>
                                            </div>
                                
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input wire:model="country" type="text" class="form-control" id="country">
                                                </div>
                                            </div> --}}
                                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input wire:model.live="address" type="text" placeholder="Address" class="form-control" id="address">
                                                    @error('address') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                  

                                
                                   
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="profile_photo_path">Profile Photo Path</label>
                                                    <input wire:model.live="profile_photo_path" type="file" class="form-control" id="profile_photo_path">
                                                    @error('profile_photo_path') <span class="error">{{ $message }}</span> @enderror
                                              
                                                </div>
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
                                                    <button type="submit" wire:target="CreateUsers" wire:loading.attr="disabled"  class="btn btn-primary">Save Data</button>
                                                    <div wire:loading wire:target="CreateUsers">
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
            @include('livewire.backend.add-users.userListTable')
          
            <!-- end row -->


            
        </div>
        <!-- container-fluid -->
    </div>
</div>



