<div>


    <div class="page-content">
        <div class="container-fluid">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
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
            @role('admin')  
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
                                                    @forelse ($gerUsers as $user)
                                                    @php
                                                        $userName = '';
                                            
                                                        if ($user->role->name === 'admin') {
                                                            $userName = 'Admin'; // Display "Admin" for admin users
                                                        } elseif ($user->website_type_id == 1) {
                                                            $userName = $user->name_hin;
                                                        } elseif ($user->website_type_id == 2) {
                                                            $userName = $user->name;
                                                        } elseif ($user->website_type_id == 3) {
                                                            $userName = $user->name_pbi;
                                                        } elseif ($user->website_type_id == 4) {
                                                            $userName = $user->name_urdu;
                                                        }

                                                             
                                                            // Get the role name using the role relationship
                                                        $roleName = $user->role ? $user->role->name : ''; // Assuming the role name is in a 'name' attribute
                                                    @endphp
                                                     

                                                    <option value="{{ $user->id }}" class="{{ $user->role->name === 'admin' ? 'bg-success text-white' : ($user->role->name === 'reporter'? 'bg-dark text-white' : '') }}">
                                                        {{ $userName  }}    ({{ ucwords($roleName) }})
                                                    </option>
                                                @empty
                                                    <option value="" disabled>No users found</option>
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
                                            <div wire:ignore>
                                                  <textarea id="editor" wire:model="news_description" placeholder="Description of Event" class="form-control xtra-cat"></textarea>
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
                                                <input class="form-check-input border border-dark" type="checkbox" wire:model="breaking_side" value="Show" id="breaking_side">
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
                                            <label for="post_month">Select Month</label>
                                            <select wire:model="post_month" class="form-select" id="post_month">
                                                <option value="">Select Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        
                                        @error('post_month') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select wire:model="status" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Approved"  selected>Approved</option>
                                                <option value="Rejected">Rejected</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                             @error('status') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit"   wire:loading.attr="disabled"  class="btn btn-primary">Create News</button>
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
            {{-- Table row start  --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Manage News</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                            
                <div class="row">
                    <div class="col-md-2">
                        <!-- News Type -->
                        <div class="form-group">
                            <label for="type_search">News Type</label>
                            <select name="type_search" wire:model="type_search" id="type_search" class="form-control" wire:change="filterByType">
                                <option value="">Select type</option>
                                @forelse ($getwebsite_type as $type)
                                    <option value="{{ $type->name }}">{{ $type->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('type_search') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    

                    <div class="col-md-2 ">
                        <!-- Category ID -->
                        <div class="form-group">
                            <label for="category_search">Category </label>
                            <select name="category_search" wire:model="category_search" id="category_search" class="form-control"  wire:change="filterByCategpry">
                                    <option value=""> Select type</option>
                                    @forelse ($getCategory as $category )
                                        <option value="{{$category->category_en}}">{{$category->category_en}}</option>
                                    @empty
                                    @endforelse
                            </select>
                            @error('category_search') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    {{-- date --}}
                    <div class="col-md-2 ">
                        <!-- News Type -->
                        <div class="form-group">
                            <label for="type_search">Date wise</label>
                            <input type="date" class="form-control" wire:model="date_search" id="post_date"  wire:change="filterByDate">
                            @error('date_search') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                

                </div>

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
                             <p class="text-success fw-bold">      Query took {{ $queryTime }} seconds.</p>

                            <span class="badge bg-success p-2  fs-4">Total news : {{ $totalrecords ?? '0'}} </span>
                           <div class="row">
                            <div class="col-md-2">
                                <form wire:submit.prevent="deleteSelected">
                                    <button type="submit" class="btn btn-danger my-3" >Delete Selected </button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form wire:submit.prevent="shareSelected">

                                <button type="submit" class="btn btn-primary my-3"  >Share  Selected </button>
                            </form>
                          
                            </div>
                           </div>
                      

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable-- table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>image</th>
                                            <th>Add Type</th>
                                            <th>Category </th>
                                            <th>User Name </th>
                                            <th>Post Date </th>
                                            <th>Post Month </th>

                                            <th>Status</th>    
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                      
                                         @forelse ( $records as $key => $record )
                                         @role('admin')
                                         <tr>
                                            <td> 
                                                {{-- $records->firstitem()+$loop->index ?? --}}
                                             <input type="checkbox" id="row_{{$record->id}}" wire:model="selectednews" value="{{$record->id}}">   {{ $key+1}} 
                                            </td>
                                            <td> 
                                                <img src="{{ isset($record->thumbnail) ? getThumbnail($record->thumbnail) : asset('no_image.jpg')}}" alt=".." class="img-size-50  img-bordered-sm rounded-circle" width="50">
                                            </td>

                                            <td>{{ ucwords($record->newstype['name']) ?? 'NA' }}</td>
                                  
                                            <td>
                                                <span class="badge bg-dark p-1"> {{ $record->getmenu['category_en'] ?? 'NA'  }}</span>
                                            
                                            </td>
                                            <td> 
                                                {{-- @if($record->user['role_id']  === '1') --}}
                                                      
                                                <span class="badge bg-success p-1"> {{$record->user['name'] ?? 'NA' }}  </span><br>
                                                
                                                <span class=" p-1"> {{ ucwords($record->user->role->name ?? "NA") }} </span>
                                                {{-- @else  --}}
                                                {{-- {{$record->user['name'] ?? 'NA' }}     --}}
                                            
                                                {{-- @endif --}}
                                                
                                            </td>

                                            <td>{{ $record->post_date }}</td>
                                            <td>{{ $record->post_month }}</td>


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
                                                    @role('admin')  
                                                    
                                                    @if($record->status  == "Approved")
                                                      
                                                    <button class="btn btn-sm btn-info" title="-pending" wire:click="pending({{$record->id}})" wire:target="pending({{ $record->id }})"  wire:loading.attr="disabled">
                                                        <i class="fa fa-thumbs-up fa-fw"></i>

                                                    </button>
                                                    @else 

                                                    <button class="btn btn-sm btn-dark" title="Add approved" wire:click="approved({{$record->id}})" wire:target="approved({{ $record->id }})"  wire:loading.attr="disabled">
                                                        <i class="fa fa-thumbs-down fa-fw"></i>

                                                    </button>
                                                    @endif
                                                    @endrole

                                                    <button class="btn btn-sm btn-success" title="View news" data-bs-toggle="modal" data-bs-target="#exampleModal{{$record->id}}">
                                                        <i class="fa fa-eye fa-fw"></i></button>
                                                    <button class="btn btn-sm btn-primary" title="Edit News" wire:click="edit({{$record->id}})" wire:target="edit({{ $record->id }})"  wire:loading.attr="disabled">
                                                        <i class="fa fa-edit fa-fw" ></i></button>
                                                        @role('admin')  
                                                    <button class="btn btn-sm btn-danger" title="Delete News" wire:click="delete({{ $record->id }})" wire:target="delete({{ $record->id }})"  wire:loading.attr="disabled">
                                                        <i class="fa fa-times fa-fw fa-lg"></i>
                                                    </button>
                                                    @endrole
                                            </td>
                                        </tr>
                                    <!-- Button trigger modal -->

  
                                        <!-- Modal -->

                                        @include('livewire.backend.news.model')
                                        <!-- Modal -->

                                        @endrole
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
                                                <td> 
                                                    @if($trash->user['role_id']  == 1)
                                                      
                                                    <span class="badge bg-success p-1"> {{$trash->user['name'] ?? 'NA' }}  </span>

                                                    @else 
                                                    {{$trash->user['name'] ?? 'NA' }}    
                                                
                                                    @endif
                                                </td>
                                                    
    
    
                                      
    
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
                                    {{-- <script>
                                            document.addEventListener('livewire:initialized', () => {
                                            Livewire.on('shareLinks',  function (e)  {
                                                console.log('WhatsApp Share Link:');
                                                var popupSize = {
                                                    width: 780,
                                                    height: 550
                                                };
                                                var verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                                                        horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

                                                    var popup = window.open($(this).prop('href'), 'social',
                                                        'width=' + popupSize.width + ',height=' + popupSize.height +
                                                        ',left=' + verticalPos + ',top=' + horisontalPos +
                                                        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

                                                    if (popup) {
                                                        popup.focus();
                                                        e.preventDefault();
                                                    }

                                        });
                                    });

                            
                            
                                        </script> --}}
                                        <script>
                  document.addEventListener('livewire:initialized', () => {
                        Livewire.on('copyShareLinks', function (shareLinks) {
                            // console.log(shareLinks)
                            let linksToCopy = '';

                            shareLinks.forEach(innerArray => {
                                innerArray.forEach(obj => {
                                    // linksToCopy += obj.whatsapp + '\n\n'; // Concatenate the 'facebook' link and add a newline
                                    linksToCopy += obj + '\n\n'; // Concatenate the 'facebook' link and add a newline

                                    // You can modify this to concatenate other social media links or format as needed
                                });
                            });

                            navigator.clipboard.writeText(linksToCopy)
                                .then(() => {
                                    console.log('Links copied to clipboard!');
                                })
                                .catch(err => {
                                    console.error('Could not copy links: ', err);
                                });
                        });
                    });

                                        </script>

                                </table>
                    {{ $records->links() }}

                            </div>
                        </div>
                     </div>
                </div>
            </div>
            <script src="{{ asset('js/share.js') }}"></script>


            @else

            @livewire('backend.news.create-reporter-news')
            @endrole
        <!-- container-fluid -->
    </div>

</div>



