<div>
    
    <div class="page-content">
        <div class="container-fluid">

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
                            <h4 class="card-title">Add News</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                         
                            <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <!-- News Type -->
                                        <div class="form-group">
                                            <label for="news_type">News Type</label>

                                            <select name="news_type" wire:model.live="news_type" id="news_type" class="form-control">
                                                <option value=""> Select type</option>
                                                @forelse ($getwebsite_type as $type )
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @empty
                                                @endforelse
                                               </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <!-- Category ID -->
                                        <div class="form-group">
                                            <label for="category_id">Category ID</label>
                                            <select name="category_id" wire:model.live="category_id" id="category_id" class="form-control">
                                                <option value=""> Select type</option>
                                                @forelse ($getCategory as $category )
                                                    <option value="{{$category->id}}">{{$category->category_en}}</option>
                                                @empty
                                                @endforelse
                                               </select>
                                        </div>
                                    </div>
                            

                                    <div class="col-md-4 mb-3">

                                        <!-- User ID -->
                                        <div class="form-group">
                                            <label for="user_id">User ID</label>
                                            <input type="text" class="form-control" wire:model="user_id" id="user_id">
                                        </div>
                                    </div>
                        
                         
                            
                                    <div class="col-md-6 mb-6">
                            
                              
                                        <!-- Title -->
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" wire:model="title" id="title">
                                        </div>
                                    </div>
                         

                                    <div class="col-md-6 mb-6">

                                        <!-- Heading -->
                                        <div class="form-group">
                                            <label for="heading">Heading</label>
                                            <input type="text" class="form-control" wire:model="heading" id="heading">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">

                                        <!-- Heading2 -->
                                        <div class="form-group">
                                            <label for="heading2">Heading2</label>
                                            <input type="text" class="form-control" wire:model="heading2" id="heading2">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">

                                        <!-- Image -->
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" wire:model="image" id="image">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">

                    
                                        <!-- Caption -->
                                        <div class="form-group">
                                            <label for="caption">Caption</label>
                                            <input type="text" class="form-control" wire:model="caption" id="caption">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">

                                        <!-- PDF File -->
                                        <div class="form-group">
                                            <label for="pdf_file">PDF File</label>
                                            <input type="file" class="form-control" wire:model="pdf_file" id="pdf_file">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <!-- News Description -->
                                        <div class="form-group">
                                            <label for="news_description">News Description</label>
                                            <textarea class="form-control border border-dark" wire:model="news_description" id="news_description"></textarea>
                                        </div>
                            
                                        <!-- Checkbox -->
                                
                                    </div>
                         
                               <!-- Slider -->

            <div class="col-md-4 mb-3">
                    <div class="form-check ">
                        <input class="form-check-input border border-dark"  type="checkbox" wire:model="slider" id="slider">
                        <label class="form-check-label" for="slider">Slider</label>
                    </div>

                    <!-- Breaking Top -->
                    <div class="form-check">
                        <input class="form-check-input border border-dark" type="checkbox" wire:model="breaking_top" id="breaking_top">
                        <label class="form-check-label" for="breaking_top">Breaking Top</label>
                    </div>

                    <!-- Breaking Side -->
                    <div class="form-check">
                        <input class="form-check-input border border-dark" type="checkbox" wire:model="breaking_side" id="breaking_side">
                        <label class="form-check-label" for="breaking_side">Breaking Side</label>
                    </div>

                    <!-- Top Stories -->
                    <div class="form-check">
                        <input class="form-check-input border border-dark" type="checkbox" wire:model="top_stories" id="top_stories">
                        <label class="form-check-label" for="top_stories">Top Stories</label>
                    </div>
        </div>
   
            <div class="col-md-4 mb-3">
                  <!-- Gallery -->
                  <div class="form-check">
                    <input class="form-check-input border border-dark" type="checkbox" wire:model="gallery" id="gallery">
                    <label class="form-check-label" for="gallery">Gallery</label>
                </div>
    
                <!-- More -->
                <div class="form-check">
                    <input class="form-check-input border border-dark" type="checkbox" wire:model="more" id="more">
                    <label class="form-check-label" for="more">More</label>
                </div>
    
                <!-- Send Notification -->
                <div class="form-check">
                    <input class="form-check-input border border-dark" type="checkbox" wire:model="send_noti" id="send_noti">
                    <label class="form-check-label" for="send_noti">Send Notification</label>
                </div>
        </div>
       

        <div class="col-md-6">
            <!-- ... (previous input fields) -->
            
            <!-- Metatags -->
            <div class="form-group">
                <label for="metatags">Metatags</label>
                <textarea class="form-control border border-dark"  wire:model="metatags" id="metatags" rows="3"></textarea>
            </div>
        </div>
        <div class="col-md-6">

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control border border-dark" wire:model="description" id="description" rows="3"></textarea>
            </div>
        </div>
        <div class="col-md-6">

            <!-- Keywords -->
            <div class="form-group">
                <label for="keywords">Keywords</label>
                <textarea class="form-control border border-dark" wire:model="keywords" id="keywords" rows="3"></textarea>
            </div>
        </div>
            <!-- Status -->
 
 

        <div class="col-md-6">
            <!-- ... (previous input fields) -->
            
            <!-- Reject Reason -->
            <div class="form-group">
                <label for="reject_reason">Reject Reason</label>
                <textarea class="form-control border border-dark"  wire:model="reject_reason" id="reject_reason" rows="3"></textarea>
            </div>
        </div>

        <div class="col-md-4">
            
            
            <!-- Post Date -->
            <div class="form-group">
                <label for="post_date">Post Date</label>
                <input type="date" class="form-control" wire:model="post_date" id="post_date">
            </div>
        </div>
        <div class="col-md-4">

            <!-- Post Month -->
            <div class="form-group">
                <label for="post_month">Post Month</label>
                <input type="date" class="form-control" wire:model="post_month" id="post_month">
            </div>
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

                     
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            
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
                                <table class="table table-bordered table-striped datatable--">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                        
                                            <th> image</th>
                                            <th>Add Type</th>
                                            <th> Name </th>
                                            <th> location </th>
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
                                                
                                                <img src="{{getThumbnail($record->thumbnail) ?? ''}}" alt=".." class="img-size-50 img-circle img-bordered-sm" width="50">
                                            
                                            </td>
                                            <td>
                                                @if($record->image_add)
                                                <img src="{{ asset('storage/addpic/'. $record->image_add)}}" alt=".." class="img-size-50 img-circle img-bordered-sm" width="50">
                                                
                                                @else
                                                <a href="{{$record->link_add?? '#'}}" target="_blank"> Link add</a>
                                                @endif
                                            </td>
                                            <td>{{ ucwords(str_replace('home.','',$record->page_name)) ?? 'NA' }}</td>
                                  
                                            <td> {{$record->location ?? 'NA' }}</td>

                                            <td>
                                                @if($record->status  == "Yes")
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



