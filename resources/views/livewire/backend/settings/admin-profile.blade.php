<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        @role('admin')
                        <h4 class="mb-sm-0 font-size-18"> Admin Profile</h4>

                        @else
                        <h4 class="mb-sm-0 font-size-18"> 	{{ ucwords( auth()->user()->roles->pluck('name')[0] )?? '' }} Profile</h4>
                        @endrole

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                             @role('admin')

                                <li class="breadcrumb-item active">Admin Profile</li>
                                @else
                                <li class="breadcrumb-item active">{{ ucwords( auth()->user()->roles->pluck('name')[0] )?? '' }} Profile</li>

                                @endrole
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

                            @role('admin')

                            <h4 class="card-title">update  Profile</h4>

                            @else
                            <h4 class="card-title">Update {{ ucwords( auth()->user()->roles->pluck('name')[0] )?? '' }}  Profile</h4>


                            @endrole
                        </div>
                        <div class="card-body">
           
                            <form  enctype="multipart/form-data" wire:submit="updateadminProfile">
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" id="" wire:model.live="name" >
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="" wire:model.live="email">
                                        @error('email') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Profile</label>
                                        <input type="file" class="form-control" id="" wire:model.live="profile" >
                                        @error('profile') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                              
                                        
                                        <img src="{{ asset('storage/uploads').'/'.$this->profile_photo_path }}" alt="Image" width="100" height="70"/>
                                    </div>
                                </div>

                      

                                <div>
                                    <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md">Update Profile</button>
                                </div>
                                <div wire:loading wire:target="updateadminProfile">
                                     <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
          
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Update  Password</h4>
                        </div>
                        <div class="card-body">
                        
                            {{-- password  --}}
                            <!--form starts-->
                        <!-- resources/views/livewire/reset-password.blade.php -->

<div>
  <!-- resources/views/livewire/reset-password.blade.php -->

<div>
    <form wire:submit="resetPassword">
        <input type="hidden" wire:model.live="token">

        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Old Password</label>
                <input type="password" id="old_pass" class="form-control" wire:model.live="old_pass" placeholder="Old Password" required>
                @error('old_pass') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" id="password" class="form-control" wire:model.live="password" placeholder="Mew Password" required>
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" wire:model.live="password_confirmation" required>
                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <button type="submit" wire:loading.attr="disabled" class="btn btn-primary w-md">Reset Password</button>
        </div>
        <div wire:loading wire:target="resetPassword">
            <img src="{{ asset('loading.gif') }}" width="30" height="30" class="m-auto mt-1/4">
        </div>
    </form>
</div>

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
