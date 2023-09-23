<div>
    <div class="page-content">
        <div class="container-fluid">
            <script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage News</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Create News</li>
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
                            <h4 class="card-title">Manage News</h4>
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
                                <table class="table table-bordered table-striped datatable-- table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>image</th>
                                            <th>Add Type</th>
                                            <th>Category </th>
                                            <th>User Name </th>
                                            <th>Status</th>    
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                      
                                         @forelse ( $records as $key => $record )
                                         @if($record->role_id != 1)
                                         <tr>
                                            <td> {{ $key+1}}</td>
                                            <td> 
                                                <img src="{{ isset($record->thumbnail) ? getThumbnail($record->thumbnail) : asset('no_image.jpg')}}" alt=".." class="img-size-50  img-bordered-sm rounded-circle" width="50">
                                            </td>

                                            <td>{{ ucwords($record->newstype['name']) ?? 'NA' }}</td>
                                  
                                            <td>
                                                <span class="badge bg-dark p-1"> {{ $record->getmenu['category_en'] ?? 'NA'  }}</span>
                                            
                                            </td>
                                            <td> {{$record->user['name'] ?? 'NA' }}</td>


                                            <td>
                                                @if($record->status  == "Approved")
                                                <a href="javascript:void(0)" wire:click="rejected({{$record->id}})">
                                                    <span class="badge bg-success" > Approved</span>
                                                </a> 
                                            @elseif($record->status  == "Rejected")
                                            <a href="javascript:void(0)" wire:click="approved({{$record->id}})">
                                                <span class="badge bg-danger" >Rejected   </span>
                                            </a> 
                                            @else
                                                <a href="javascript:void(0)" wire:click="pending({{$record->id}})">
                                                    <span class="badge bg-warning" >  Pending </span>
                                                </a> 
                                            </td>

                                           @endif
                                                <td>   
                                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{$record->id}}">
                                                        <i class="fa fa-eye fa-fw"></i></button>
                                                    <button class="btn btn-sm btn-primary" wire:click="edit({{$record->id}})" wire:target="edit({{ $record->id }})"  wire:loading.attr="disabled">
                                                        <i class="fa fa-edit fa-fw" ></i></button>
                                                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $record->id }})" wire:target="delete({{ $record->id }})"  wire:loading.attr="disabled">
                                                        <i class="fa fa-times fa-fw fa-lg"></i></button>
                        
                                                {{-- <a  href="javascript:void(0)" wire:click="edit({{$record->id}})" class="text-success me-2" title="Edit"  ><i class="fa fa-edit fa-fw"></i></a> --}}
                                                {{-- <a href="javascript:void(0)" class="text-danger me-2" title="Delete" ><i class="fa fa-times fa-fw fa-lg"></i></a> --}}
                                            </td>
                                        </tr>
                                    <!-- Button trigger modal -->

  
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$record->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">News Detail</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4> <span class="text-success "> User Name: </span>
                                                        <span class="text-primary "> {{$record->user['name'] ?? 'NA' }} </span>
                                                    </h4>
                                                    <h4> <span class="text-success ">Category (Menu): </span>
                                                        <span class="badge bg-dark p-1"> {{ $record->getmenu['category_en'] ?? 'NA'  }}</span>
                                                   </h4>
                                                 
                                                    <h4> <span class="text-success">News Title :</span> </h4>
                                                     <p> {{ ucwords($record->title) ?? 'NA' }}  </p>

                                                    <h4> <span class="text-success">News Heading :</span> </h4>
                                                     <p> {{ ucwords($record->heading) ?? 'NA' }}  </p> 
                        

                                                     <h4> <span class="text-success">News Description :</span> </h4>
                                                      <p> {{ ucwords($record->news_description) ?? 'NA' }}  </p> 
                                                    <h4> <span class="text-success">News Type :</span>
                                                        {{ ucwords($record->newstype['name']) ?? 'NA' }}
                                                    </h4>
                                                
                                              
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <h6> <span class="text-success"> Slider  :</span> </h6>
                                                        <p> {{ ucwords($record->slider) ?? 'NA' }}  </p> 
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h6> <span class="text-success"> Breaking top  :</span> </h6>
                                                        <p> {{ ucwords($record->breaking_top) ?? 'NA' }}  </p> 
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h6> <span class="text-success"> Breaking side  :</span> </h6>
                                                        <p> {{ ucwords($record->breaking_side) ?? 'NA' }}  </p> 
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h6> <span class="text-success"> Top stories  :</span> </h6>
                                                        <p> {{ ucwords($record->top_stories) ?? 'NA' }}  </p> 
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h6> <span class="text-success">  Gallery  :</span> </h6>
                                                        <p> {{ ucwords($record->gallery) ?? 'NA' }}  </p> 
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h6> <span class="text-success"> More  :</span> </h6>
                                                        <p> {{ ucwords($record->more) ?? 'NA' }}  </p> 
                                                    </div>
                                                </div>
                                                </div>

                                            </div>
                                            </div>
                                        </div>
                                        @endif
                                         @empty
                                            <tr  class="text-center ">
                                                <td colspan="7" class="text-danger fw-bold"> Record Not Found</td>                                           
                                            </tr>
                             
                                             @endforelse 

        {{-- ========================= trash data =========================== --}}
     
                                             @if(isset($trashdata) & count($trashdata) > 0 )
                                             <tr> <th colspan="7">
                                                <h3>  Trash data </h3>
                                                 </th></tr>
                                             @forelse ($trashdata  as $keys => $trash )
                                             <tr>
                                                <td> {{  $trash->id}}</td>

                                                
                                                <td> 
                                                    <img src="{{ isset($trash->thumbnail) ? getThumbnail($trash->thumbnail) : asset('no_image.jpg')}}" alt=".." class="img-size-50  img-bordered-sm rounded-circle" width="50">
                                                </td>
    
                                                <td>{{ ucwords($trash->newstype['name']) ?? 'NA' }}</td>
                                      
                                                <td>
                                                    <span class="badge bg-dark p-1"> {{ $trash->getmenu['category_en'] ?? 'NA'  }}</span>
                                                
                                                </td>
                                                <td> {{$trash->user['name'] ?? 'NA' }}</td>
    
    
                                      
    
                                                    <td colspan="2" class="text-center">   
                                            
                                                        <button class="btn btn-sm btn-danger" wire:click="restore({{ $trash->id }})" wire:target="restore({{ $trash->id }})"  wire:loading.attr="disabled">
                                                            Restore</button>
                            
                                                    {{-- <a  href="javascript:void(0)" wire:click="edit({{$record->id}})" class="text-success me-2" title="Edit"  ><i class="fa fa-edit fa-fw"></i></a> --}}
                                                    {{-- <a href="javascript:void(0)" class="text-danger me-2" title="Delete" ><i class="fa fa-times fa-fw fa-lg"></i></a> --}}
                                                </td>
                                            </tr>
                                             @empty
                                                 
                                             @endforelse
                                             @endif
                                    </tbody>
                                </table>
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
                            {{-- @if($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="row">                     
                                <div class="col-lg-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div>{{$error}}</div>
                                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif --}}
                         <form  wire:submit.prevent="createNews">
                            <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <!-- News Type -->

                                        <div class="form-group">
                                            <label for="news_type">News Type</label>
                                            <select name="news_type" wire:model="news_type" id="news_type" class="form-control" wire:change="handleChange">
                                                <option value=""> Select type</option>
                                                @forelse ($getwebsite_type as $type )
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            @error('news_type') <span class="error">{{ $message }}</span> @enderror
                                        </div>



                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <!-- Category ID -->
                                        <div class="form-group">
                                            <label for="category_id">Category </label>
                                            <select name="category_id" wire:model.live="category_id" id="category_id" class="form-control">
                                                    <option value=""> Select type</option>
                                                    @forelse ($getCategory as $category )
                                                        <option value="{{$category->id}}">{{$category->category_en}}</option>
                                                    @empty
                                                    @endforelse
                                            </select>
                                            @error('category_id') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                        
                                    <div class="col-md-4 mb-3">
                                        <!-- User ID -->
                                        <div class="form-group">
                                            <label for="user_id">User </label>
                                            <select name="user_id" wire:model.live="user_id" id="user_id" class="form-control">
                                                <option value=""> Select User</option>

                                            @forelse ($gerUsers as $user )
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                
                                            @empty
                                                    not found 
                                            @endforelse
                                    
                                            </select>
                                            @error('user_id') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <!-- Title -->
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" wire:model="title" id="title">
                                            @error('title') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <!-- Heading -->
                                        <div class="form-group">
                                            <label for="heading">Heading</label>
                                            <input type="text" class="form-control" wire:model="heading" id="heading">
                                            @error('heading') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <!-- Heading2 -->
                                        <div class="form-group">
                                            <label for="heading2">Heading2</label>
                                            <input type="text" class="form-control" wire:model="heading2" id="heading2">
                                            @error('heading2') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <!-- Image -->
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" wire:model="image" id="image">
                                            @error('image') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <!-- Caption -->
                                        <div class="form-group">
                                            <label for="caption">Caption</label>
                                            <input type="text" class="form-control" wire:model="caption" id="caption">
                                            @error('caption') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <!-- PDF File -->
                                        <div class="form-group">
                                            <label for="pdf_file">PDF File</label>
                                            <input type="file" class="form-control" wire:model="pdf_file" id="pdf_file">
                                            @error('pdf_file') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

          
                  
                                    <div class="col-md-12">
                                        <div class="mb-3" >
                                            <label class="form-label"> News Description</label>
                                          
                                 
                                            <div >
                                                <textarea id="editor" wire:model="news_description" placeholder="Description of Event" class="form-control "></textarea>
                                           
       
                                               </div>
                     
                                                 @error('news_description') <span class="error">{{ $message }}</span> @enderror
                                         
                                        </div>
                                    </div>
                                    <!-- Slider -->
                                    <div class="col-md-4 mb-3">
                                            <div class="form-check ">
                                                <input wire:model="slider" value="Show" class="form-check-input border border-dark"  type="checkbox"  id="slider">
                                                <label class="form-check-label" for="slider">Slider</label>
                                                @error('slider') <span class="error">{{ $message }}</span> @enderror
                                            </div>

                                            <!-- Breaking Top -->
                                            <div class="form-check">
                                                <input class="form-check-input border border-dark" type="checkbox" wire:model="breaking_top"  value="Show" id="breaking_top">
                                                <label class="form-check-label" for="breaking_top">Breaking Top</label>
                                                @error('breaking_top') <span class="error">{{ $message }}</span> @enderror
                                            </div>

                                            <!-- Breaking Side -->
                                            <div class="form-check">
                                                <input class="form-check-input border border-dark" type="checkbox" wire:model="breaking_side value="Show"" id="breaking_side">
                                                <label class="form-check-label" for="breaking_side">Breaking Side</label>
                                                @error('breaking_side') <span class="error">{{ $message }}</span> @enderror

                                            </div>

                                            <!-- Top Stories -->
                                            <div class="form-check">
                                                <input class="form-check-input border border-dark" type="checkbox" wire:model="top_stories" value="Show" id="top_stories">
                                                <label class="form-check-label" for="top_stories">Top Stories</label>
                                                @error('top_stories') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                    </div>
            
                                    <div class="col-md-4 mb-3">
                                        <!-- Gallery -->
                                        <div class="form-check">
                                            <input class="form-check-input border border-dark" type="checkbox" wire:model="gallery" value="Show" id="gallery">
                                            <label class="form-check-label" for="gallery">Gallery</label>
                                            @error('gallery') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                            
                                        <!-- More -->
                                        <div class="form-check">
                                            <input class="form-check-input border border-dark" type="checkbox" wire:model="more" value="Show" id="more">
                                            <label class="form-check-label" for="more">More</label>
                                            @error('more') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                            
                                        <!-- Send Notification -->
                                        <div class="form-check">
                                            <input class="form-check-input border border-dark" type="checkbox" wire:model="send_noti" value="Show" id="send_noti">
                                            <label class="form-check-label" for="send_noti">Send Notification</label>
                                            @error('send_noti') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Metatags -->
                                        <div class="form-group">
                                            <label for="metatags">Metatags</label>
                                            <textarea class="form-control border border-dark"  wire:model="metatags" id="metatags" rows="3"></textarea>
                                            @error('metatags') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Description -->
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control border border-dark" wire:model="description" id="description" rows="3"></textarea>
                                        </div>
                                        @error('description') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Keywords -->
                                        <div class="form-group">
                                            <label for="keywords">Keywords</label>
                                            <textarea class="form-control border border-dark" wire:model="keywords" id="keywords" rows="3"></textarea>
                                        </div>
                                        @error('keywords') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <!-- Reject Reason -->
                                        <div class="form-group">
                                            <label for="reject_reason">Reject Reason</label>
                                            <textarea class="form-control border border-dark"  wire:model="reject_reason" id="reject_reason" rows="3"></textarea>
                                        </div>
                                        @error('reject_reason') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Post Date -->
                                        <div class="form-group">
                                            <label for="post_date">Post Date</label>
                                            <input type="date" class="form-control" wire:model="post_date" id="post_date">
                                        </div>
                                        @error('post_date') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Post Month -->
                                        <div class="form-group">
                                            <label for="post_month">Post Month</label>
                                            <input type="date" class="form-control" wire:model="post_month" id="post_month">
                                        </div>
                                        @error('post_month') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select wire:model="status" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Approved">Approved</option>
                                                <option value="Rejected">Rejected</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                             @error('status') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" wire:target="createNews" wire:loading.attr="disabled"  class="btn btn-primary">Create News</button>
                                                <div wire:loading wire:target="createNews">
                                                    <i class="fas fa-1x fa-sync-alt fa-spin"></i>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
            
      
            <!-- end row -->


            
        </div>
        <!-- container-fluid -->
    </div>

</div>



