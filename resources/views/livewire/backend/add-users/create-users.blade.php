<div>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> --}}

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
                            <form wire:submit="CreateUsers"> <!-- Add a Livewire form -->

                    
                                <!-- First Row -->
                                <div>
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
                                                    <label for="name">Name</label>
                                                    <input wire:model.live="name" type="text" placeholder="Name" class="form-control" id="name">
                                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="role_id">Role</label>
                                                    <select wire:model.live="role_id" class="form-control" id="role_id">
                                                        <option  value="">Select Role</option>
                                                        @forelse ($getRoles as $role )
                                                            @if($role->id != 1)
                                                                <option value="{{$role->id}}"> {{ ucwords($role->name)}}</option>
                                                                @endif
                                                            @empty
                                                            
                                                        @endforelse
                                                        @error('role_id') <span class="error">{{ $message }}</span> @enderror

                                                        <!-- Add more role options as needed -->
                                                    </select>
                                                </div>
                                            </div>
                                
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input wire:model.live="username"  placeholder="Username" type="text" class="form-control" id="username">
                                                    @error('username') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input wire:model.live="email" placeholder="email"  type="email" class="form-control" id="email">
                                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                  
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input wire:model="password" type="password" placeholder="Password" class="form-control" id="password">
                                                    @error('password') <span class="error">{{ $message }}</span> @enderror
                                                    
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
                                  
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="about">About</label>
                                                    <input wire:model.live="about" type="text" placeholder="About" class="form-control" id="about">
                                                    @error('about') <span class="error">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <input wire:model.live="mobile" type="text" placeholder="Mobile" class="form-control" id="mobile">
                                                    @error('mobile') <span class="error">{{ $message }}</span> @enderror
                                                
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
                                
                                            <div class="col-md-12">
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
                                
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select wire:model="status" class="form-select">
                                                        <option value="">Select</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive </option>
                                                   </select>
                                                   @error('status') <span class="error">{{ $message }}</span> @enderror
        
                                                </div>
                                            </div>

                                            
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
                                </div>
                                
                    
                                <!-- Third Row -->
                          
                    
                                <!-- Fourth Row -->
                     
                    
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
                                            <td>Profile</td>
                                            <th> Name </th>
                                            <th> Email </th>
                                            <th> Website</th>
                                            <th> Menus</th>
                                            <th>Status</th>    
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                      
                                         @forelse ( $records as $key => $record )
                                         @if($record->role_id != 1)
                                         <tr>
                                            <td> {{ $key+1}}</td>
                                            <td>  <img src="{{asset('storage/'.$record->profile_photo_path)}}" alt=".." class="img-size-50 img-circle img-bordered-sm" width="50"></td>

                                            <td>{{$record->name ?? 'NA' }}</td>
                                  
                                            <td> {{$record->email ?? 'NA' }}</td>
                                            <td> {{$record->websiteType['name'] ?? 'NA' }} </td>
                                            <td>
                                                @php
                                                    $assignedMenus = $record->assignedMenus;
                                                @endphp
                                                @forelse ($assignedMenus as $index => $assignedMenu)
                                                    <span class="badge bg-dark"> {{ $assignedMenu->getmenu->category_en ?? 'NA'  }}</span>
                                                    
                                                @empty
                                               {{ 'NA'}}
                                                @endforelse
                                            </td>
                                      
                                            <td>
                                                @if($record->status  == "1")
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



