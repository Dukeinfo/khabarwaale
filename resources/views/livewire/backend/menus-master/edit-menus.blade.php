<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Menu</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Menu</li>
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
                            <h4 class="card-title">Edit Menu</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            <form wire:submit="updateMenu"> <!-- Add a Livewire form -->
                                    @csrf
                                <!-- First Row -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_en">Category (English)</label>
                                            <input wire:model.live="menuform.category_en" type="text" class="form-control" id="category_en" placeholder="English Category">
                                            @error('menuform.category_en') <span class="error">{{ $message }}</span> @enderror
                                       
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_hin">Category (Hindi)</label>
                                            <input wire:model.live="menuform.category_hin" type="text" class="form-control" id="category_hin" placeholder="Hindi Category">
                                            @error('menuform.category_hin') <span class="error">{{ $message }}</span> @enderror
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_pbi">Category (Punjabi)</label>
                                            <input wire:model.live="menuform.category_pbi" type="text" class="form-control" id="category_pbi" placeholder="Punjabi Category">
                                        
                                            @error('menuform.category_pbi') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                    
                                <!-- Second Row -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_urdu">Category (Urdu)</label>
                                            <input wire:model.live="menuform.category_urdu" type="text" class="form-control" id="category_urdu" placeholder="Urdu Category">
                                            @error('menuform.category_urdu') <span class="error">{{ $message }}</span> @enderror
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="route_link">Route Link</label>
                                            <input wire:model.live="menuform.route_link" type="text" class="form-control" id="route_link" placeholder="Route Link">
                                            @error('menuform.route_link') <span class="error">{{ $message }}</span> @enderror
                                       
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sort_id">Sort ID</label>
                                            <input wire:model.live="menuform.sort_id" type="number" class="form-control" id="sort_id" placeholder="Sort ID">
                                            @error('menuform.sort_id') <span class="error">{{ $message }}</span> @enderror
                                        
                                        </div>
                                    </div>
                                </div>
                    
                                <!-- Third Row -->
                                <div class="row">
                             
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select wire:model.live="menuform.status" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive </option>
                                           </select>
                                           @error('menuform.status') <span class="error">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                            
                                </div>
                    
                                <!-- Fourth Row -->
                     
                    
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <button type="submit" wire:target="updateMenu" wire:loading.attr="disabled"  class="btn btn-primary">update Data</button>
                                        <div wire:loading wire:target="updateMenu">
                                            <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">
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



