<div>

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Update Footer Snippets </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"> Footer</li>
                                <li class="breadcrumb-item active">Footer Snippets</li>
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
                            <h4 class="card-title">Update Footer Snippets</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">

                  {{-- form code  --}}
  
                    <form wire:submit.prevent="submitFooterSnippets">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="meta_title">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid
                                             @enderror" wire:model.lazy="title" id="meta_title" name="meta_title" placeholder="Meta Title">
                                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                     </div>
                                </div>

                             
                          
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea rows="5" class="form-control @error('description') is-invalid @enderror"
                                     wire:model="description" id="description" name="description" placeholder="Meta Description"></textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                     
            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="sort_id">Sort ID</label>
                                    <input type="text" class="form-control  @error('description') is-invalid @enderror " wire:model.lazy="sort_id" id="sort_id" name="sort_id" placeholder="Sort ID">
                                    @error('sort_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                        <div class="col-md-4">

                            <div class="form-group mb-3">
                                <label for="status">Status</label>
                                <select class="form-select  @error('description') is-invalid @enderror" wire:model="status">
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



