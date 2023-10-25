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
                            <h4 class="card-title">Add Menu</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            <form wire:submit="storeData"> <!-- Add a Livewire form -->

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
                                        <button type="submit" wire:target="storeData" wire:loading.attr="disabled"  class="btn btn-primary">Save Data</button>
                                        <div wire:loading wire:target="storeData">
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
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Manage Menus</h4>
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
                                            <th> Name eng</th>
                                            <th> Name  hindi </th>
                                            <th> Name pbi</th>
                                            <th> Name Urdu</th>


                                            <th>Sorting Order</th>
                                            <th>Status</th>    
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                      
                                         @forelse ( $records as $key => $record )
                                         <tr>
                                            <td> {{ $key+1}}</td>
                                            <td>{{$record->category_en ?? 'NA' }}
                                            </td>
                                            <td> {{$record->category_hin ?? 'NA' }}</td>
                                            <td> {{$record->category_pbi ?? 'NA' }} </td>
                                             <td>{{$record->category_urdu ?? 'NA' }}
                                            </td>
                                
                                            <td>{{$record->sort_id ?? 'NA' }}</td>
                                            <td>
                                                @if($record->status  == "Active")
                                                <a href="javascript:void(0)" wire:click="inactive({{$record->id}})">
                                                    <span class="badge badge-soft-success" > {{$record->status ?? '' }}</span>
                                                </a> 
                                            @else
                                                <a href="javascript:void(0)" wire:click="active({{$record->id}})">
                                                    <span class="badge badge-soft-danger" >  {{$record->status ?? '' }} </span>
                                                </a> 
                                            </td>

                                           @endif
                                                <td>   
                                                <a  href="javascript:void(0)" wire:click="edit({{$record->id}})" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
                                                <a href="javascript:void(0)" class="text-danger me-2" title="Delete" wire:click="delete({{ $record->id }})"><i class="fa fa-times fa-fw fa-lg"></i></a>
                                            </td>
                                        </tr>
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



