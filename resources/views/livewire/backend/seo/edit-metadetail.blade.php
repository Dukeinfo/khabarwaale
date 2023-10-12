<div>

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Meta Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Update Meta Details</li>
                                <li class="breadcrumb-item active">News</li>
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
                            <h4 class="card-title">Edit Meta Detail</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">

                  {{-- form code  --}}
  
                    <form wire:submit.prevent="UpdateMetaDetail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control @error('meta_title') is-invalid @enderror" wire:model.lazy="meta_title" id="meta_title" name="meta_title" placeholder="Meta Title">
                                    @error('meta_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keywords</label>
                                    <input type="text" class="form-control @error('meta_keyword') is-invalid @enderror" wire:model.lazy="meta_keyword" id="meta_keyword" name="meta_keyword" placeholder="Meta Keywords">
                                    @error('meta_keyword') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control @error('meta_description') is-invalid @enderror" wire:model.lazy="meta_description" id="meta_description" name="meta_description" placeholder="Meta Description"></textarea>
                                    @error('meta_description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="meta_author">Meta Author</label>
                                    <input type="text" class="form-control  @error('meta_author') is-invalid @enderror" wire:model.lazy="meta_author" id="meta_author" name="meta_author" placeholder="Meta Author">
                                    @error('meta_author') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="google_analytics">Google Analytics</label>
                                    <textarea class="form-control  @error('google_analytics') is-invalid @enderror" wire:model.lazy="google_analytics" id="google_analytics" name="google_analytics" placeholder="Google Analytics"></textarea>
                                    @error('google_analytics') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="google_verification">Google Verification</label>
                                    <input type="text" class="form-control  @error('google_verification') is-invalid @enderror" wire:model.lazy="google_verification" id="google_verification" name="google_verification" placeholder="Google Verification">
                                    @error('google_verification') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                
                 
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="alexa_analytics">Alexa Analytics</label>
                                    <textarea class="form-control  @error('alexa_analytics') is-invalid @enderror" wire:model.lazy="alexa_analytics" id="alexa_analytics" name="alexa_analytics" placeholder="Alexa Analytics"></textarea>
                                    @error('alexa_analytics') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group mb-3">
                                    <label for="sort_id">Sort ID</label>
                                    <input type="text" class="form-control" wire:model.lazy="sort_id" id="sort_id" name="sort_id" placeholder="Sort ID">
                                    @error('sort_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        <div class="col-md-6">

                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <select class="form-select" wire:model="status">
                                        <option value="">Select</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                      
                                    </select>
                                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" wire:loading.attr="disabled" class="btn btn-primary mt-3">Update</button>
                    </form>
                    
        
                
                  {{-- end form code  --}}



                    </div>
                </div>
            </div>
            <!-- end row -->
            
      


            
        </div>
        <!-- container-fluid -->
    </div>

</div>



