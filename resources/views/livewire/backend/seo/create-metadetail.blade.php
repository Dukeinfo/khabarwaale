<div>

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Meta Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Create Meta Details</li>
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
                            <h4 class="card-title">Manage Meta Details</h4>
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
                            <span class="badge bg-success p-2  fs-4">Total Meta : </span>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable-- table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Meta Title</th>
                                            <th>Meta Keyword</th>
                                            <th>Meta Description</th>
                                            <th>Alexa Analytics</th>
                                            <th>Sort ID</th>
                                            <th>Status</th>  
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                      
                                         @forelse ( $records as $key => $seoMetadetail )
                                   
                                         <tr>
                                            <td>
                                               {{  $key +1  ?? "NA" }}   
                                            </td>

                                            <td>{{ $seoMetadetail->meta_title ?? "NA"  }}</td>
                             
                                                <td>{{ $seoMetadetail->meta_title ?? "NA"  }}</td>
                                                <td>{{ $seoMetadetail->meta_keyword  ?? "NA" }}</td>
                                                <td>{{ $seoMetadetail->meta_description ?? "NA" }}</td>
                                                <td>{{ $seoMetadetail->alexa_analytics  ?? "NA"}}</td>
                                                <td>{{ $seoMetadetail->sort_id  ?? "NA"}}</td>
                            
                                            <td>
                                                @if($seoMetadetail->status  == "Active")
                                                <a href="javascript:void(0)" wire:click="inactive({{$seoMetadetail->id}})">
                                                    <span class="badge bg-success" > Active</span>
                                                </a> 
                                                @elseif($seoMetadetail->status  == "Inactive")
                                                <a href="javascript:void(0)" wire:click="active({{$seoMetadetail->id}})">
                                                    <span class="badge bg-danger" >Inactive   </span>
                                                </a> 
                                                @endif
                                        
                                            </td>

                                                <td>   
                                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{$seoMetadetail->id}}">
                                                        <i class="fa fa-eye fa-fw"></i></button>
                                                    <button class="btn btn-sm btn-primary" wire:click="edit({{$seoMetadetail->id}})" wire:target="edit({{ $seoMetadetail->id }})"  wire:loading.attr="disabled">
                                                        <i class="fa fa-edit fa-fw" ></i></button>
                                                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $seoMetadetail->id }})" wire:target="delete({{ $seoMetadetail->id }})"  wire:loading.attr="disabled">
                                                        <i class="fa fa-times fa-fw fa-lg"></i></button>
                                            </td>
                                        </tr>
                                    <!-- Button trigger modal -->

  
                                        <!-- Modal -->

                                        {{-- @include('livewire.backend.news.model') --}}
                                        <!-- Modal -->

                                         @empty
                                            <tr  class="text-center ">
                                                <td colspan="7" class="text-danger fw-bold"> Record Not Found</td>                                           
                                            </tr>
                             
                                             @endforelse 

        {{-- ========================= trash data =========================== --}}
     
                                             @if(isset($trashdata) & count($trashdata) > 0 )
                                             <tr> 
                                                <th colspan="7">
                                                    <h3>  Trash data </h3>
                                                 </th>
                                                </tr>
                                                <tr>
                                                    <th>Meta id</th>
                                                    <th>Meta Title</th>
                                                    <th>Meta Keyword</th>
                                                    <th>Meta Description</th>
                                      
                                                </tr>
                                             @forelse ($trashdata  as $keys => $trash )
                                             <tr>
                                                <td> {{  $trash->id}}</td>
                                                <td>{{ $trash->meta_title ?? "NA"  }}</td>
                                                <td>{{ $trash->meta_keyword  ?? "NA" }}</td>
                                                <td>{{ $seoMetadetail->meta_description  ?? "NA"}}</td>
                                                    <td colspan="2" class="text-center">   
                                            
                                                    <button class="btn btn-sm btn-danger" wire:click="restore({{ $trash->id }})" wire:target="restore({{ $trash->id }})"  wire:loading.attr="disabled">
                                                    Restore</button>
                                                    <button class="btn btn-sm btn-warning" onclick="confirm('Are you sure you want to Peramanetly remove  this News ?') || event.stopImmediatePropagation()" wire:click="paramDelete({{ $trash->id }})" wire:target="paramDelete({{ $trash->id }})"  wire:loading.attr="disabled">
                                                    Peramanet Delete</button>
                                                    {{-- <a  href="javascript:void(0)" wire:click="edit({{$record->id}})" class="text-success me-2" title="Edit"  ><i class="fa fa-edit fa-fw"></i></a> --}}
                                                    {{-- <a href="javascript:void(0)" class="text-danger me-2" title="Delete" ><i class="fa fa-times fa-fw fa-lg"></i></a> --}}
                                                </td>
                                            </tr>
                                             @empty
                                                                   
                                             @endforelse       
                                             @endif
                                    </tbody>

                                </table>
                    {{-- {{ $records->links() }} --}}

                            </div>
                        </div>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Add News</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">

                  {{-- form code  --}}
  
                    <form wire:submit.prevent="submitMetaDetail">
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
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                    
        
                
                  {{-- end form code  --}}



                    </div>
                </div>
            </div>
            <!-- end row -->
            
      
            <!-- end row -->
            <script>
            document.addEventListener('livewire:initialized', () => {
            // CKEDITOR.replace('editor'); 
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');        
                CKEDITOR.replace('editor', {
                // filebrowserUploadUrl: '{{ route("image.upload") }}', // Set the image upload endpoint URL
                filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form', // Use form-based file upload (default is XMLHttpRequest)
                filebrowserBrowseUrl: '/ckfinder/ckfinder.html', // Set the CKFinder browse server URL
                filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images', // Set the CKFinder image browse server URL
                headers: {
                'X-CSRF-TOKEN': csrfToken // Pass the CSRF token with the request headers
                },

                });

            CKEDITOR.instances.editor.on('change', function () {
                @this.set('news_description', CKEDITOR.instances.editor.getData());
            });
            // Livewire.on('post-created', function () {
            //     });

            Livewire.on('formSubmitted', function () {
                 CKEDITOR.instances.editor.setData(''); // Reset CKEditor content

            });

            }); 
            </script>

            
        </div>
        <!-- container-fluid -->
    </div>

</div>



