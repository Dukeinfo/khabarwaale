<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Update Videos</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Update Videos</li>
                                <li class="breadcrumb-item active">Manage Videos</li>
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
                            <h4 class="card-title">Edit Videos</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                       <!-- Add a Livewire form -->

                                <!-- First Row -->
                               
                              
                                <form wire:submit.prevent="updateVideo">
                                        

                                    <div class="row">
                          
                                        <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="video_title" class="form-label">Video Title</label>
                                            <input type="text" class="form-control" id="video_title" wire:model="video_title_en" placeholder="Video Title">
                                            @error('video_title_en') <span class="error">{{ $message }}</span> @enderror
                                       
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="video_url" class="form-label">Video URL</label>
                                            <input type="text" class="form-control" id="video_url" wire:model="video_url" placeholder="https://example.com">
                                            @error('video_url') <span class="error">{{ $message }}</span> @enderror
                                        
                                        </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="editvideo_image" class="form-label">Video Image </label>
                                                <input type="file" class="form-control" id="editvideo_image" wire:model="editvideo_image">
                                                @error('editvideo_image') <span class="error">{{ $message }}</span> @enderror

                                            </div>
                                        </div> --}}
                                        <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="post_date" class="form-label">Post Date</label>
                                            <input type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control" id="post_date" wire:model="post_date">
                                            @error('post_date') <span class="error">{{ $message }}</span> @enderror
                                        
                                        </div>
                                        </div>

                                        {{-- <div class="col-md-4">
                                            <label for="sort_id">Sort ID</label>
                                            <input wire:model="sort_id" type="number" placeholder="sort no" class="form-control" id="sort_id" placeholder="VSort no">
                                            @error('sort_id') <span class="error">{{ $message }}</span> @enderror
                                      
                                        </div> --}}
{{--                                     
                                        <div class="col-md-4">
                                            <label for="status">Status</label>
                                            <select wire:model="status" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive </option>
                                           </select>
                                           @error('status') <span class="error">{{ $message }}</span> @enderror

                                        </div> --}}
                                    </div>
                                
                           
                              
                                
                        
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" wire:target="CreateVideo" wire:loading.attr="disabled"  class="btn btn-primary">Save Data</button>
                                            <div wire:loading >
                                                <i class="fas fa-1x fa-sync-alt fa-spin"></i>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        
                                
                                
                    
                                <!-- Third Row -->
                          
                    
                                <!-- Fourth Row -->
                     
                    
                            
                            <!--form starts-->
                     
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
</div>



