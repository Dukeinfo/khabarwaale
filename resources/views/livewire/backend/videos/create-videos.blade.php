<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Videos</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Create Videos</li>
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
                            <h4 class="card-title">Add Videos</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                       <!-- Add a Livewire form -->

                                <!-- First Row -->
                               
                              
                                <form wire:submit.prevent="CreateVideo">
                                        

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
                                            <label for="video_url" class="form-label">Video embed code </label>
                                            <input type="text" class="form-control" id="video_url" wire:model="video_url" placeholder=" https://www.youtube.com/embed/=> xWwFbMnlZU0">
                                            @error('video_url') <span class="error">{{ $message }}</span> @enderror
                                        
                                        </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="video_image" class="form-label">Video Image </label>
                                                <input type="file" class="form-control" id="video_image" wire:model="video_image">
                                                @error('video_image') <span class="error">{{ $message }}</span> @enderror

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
                                    
                                        {{-- <div class="col-md-4">
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
                                            <div wire:loading wire:target="CreateVideo">
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
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Manage Videos</h4>
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
                                <h3 >   Total Videos : {{count($records) ?? ''}}</h3>
                                <table class="table table-bordered table-striped datatable--">
                            
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            {{-- <th> image</th> --}}
                                            <th> Title </th>
                                            <th> Link </th>
                                            <th> Date </th>
                                            <th>Status</th>    
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                      
                                         @forelse ( $records as $key => $record )
                                         @if($record->role_id != 1)
                                         <tr>
                                            <td> {{ $key+1}}</td>
                                            {{-- <td> 
                                                <img src="{{isset($record->thumbnail) ? getThumbnail($record->thumbnail) :  asset('no_image.jpg')}}" alt=".." class="img-size-50 img-circle img-bordered-sm" width="50">
                                            </td> --}}
                                            <td>
                                                {{ Str::limit($record->video_title_en, 40)  ?? "NA"}}

                                            </td>
                                            {{-- https://www.youtube.com/embed/{{$livetvnews->video_url}}?rel=0 --}}   
                                                <td> <a href="https://www.youtube.com/embed/{{$record->video_url ?? '#'}}" target="_blank" title="{{$record->video_url }}"> {{  Str::limit($record->video_title_en, 40) ?? "NA"}}</a> </td>
                                                <td> 
                                                    {{ \Carbon\Carbon::parse($record->post_date )->format('d-M-y') ?? ''}} <br>
                                                    {{ $record->created_at->diffForHumans() ?? ''}}



                                                </td>
                                                <td>
                                                @if($record->status  == "Active")
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

                                                

                                                <button  href="javascript:void(0)" wire:click="edit({{$record->id}})" class="btn btn-sm btn-success" title="Edit"  wire:target="edit({{ $record->id }})"  wire:loading.attr="disabled"><i class="fa fa-edit fa-fw"></i></button>
                                                <button href="javascript:void(0)" class="btn btn-sm btn-danger" title="Delete" wire:click="delete({{ $record->id }})" wire:target="delete({{ $record->id }})"  wire:loading.attr="disabled"><i class="fa fa-times fa-fw fa-lg"></i></button>
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



