<div>

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Footer Snippets </h4>
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
                            <h4 class="card-title">Manage Footer Snippets Details</h4>
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
                            <span class="badge bg-success p-2  fs-4">Total Meta : {{count( $records) ?? ""}} </span>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable-- table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Meta Description</th>
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

                             
                                                <td>{{ $seoMetadetail->title  ?? "NA" }}</td>
                                                <td>{{ $seoMetadetail->description ?? "NA" }}</td>
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
                                                    {{-- <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{$seoMetadetail->id}}">
                                                        <i class="fa fa-eye fa-fw"></i></button> --}}
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
                                                    <th>Meta Category</th>
                                                    <th>Meta Description</th>
                                      
                                                </tr>
                                             @forelse ($trashdata  as $keys => $trash )
                                             <tr>
                                                <td> {{  $trash->id}}</td>
                                                <td>{{ $trash->title ?? "NA"  }}</td>
                                                <td>{{ $seoMetadetail->description  ?? "NA"}}</td>
                                                    <td colspan="2" class="text-center">   
                                            
                                                    <button class="btn btn-sm btn-danger" wire:click="restore({{ $trash->id }})" wire:target="restore({{ $trash->id }})"  wire:loading.attr="disabled">
                                                    Restore</button>
                                                    <button class="btn btn-sm btn-warning" onclick="confirm('Are you sure you want to Peramanetly remove  this  ?') || event.stopImmediatePropagation()" wire:click="paramDelete({{ $trash->id }})" wire:target="paramDelete({{ $trash->id }})"  wire:loading.attr="disabled">
                                                    Peramanet Delete</button>
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
                            <h4 class="card-title">Add Footer Snippets</h4>
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

                        <button type="submit" wire:loading.attr="disabled" class="btn btn-primary mt-3">Submit</button>
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



