<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom py-3">
                <h4 class="card-title">Manage users</h4>
                <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                <div class="col-md-3 float-end">
                    <div class="form-group">

                        <div class="mb-3">
                            <label class="form-label">Search</label>
                            <input type="search" class="form-control"  wire:model="search" placeholder="Search...">
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
                                <td>Profile</td>
                                <th> Name </th>
                                <th width="20%"> Email </th>
                                <th> Website</th>
                                <th width="20%"> Menus</th>
                                <th>Status</th>    
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                          
                             @forelse ( $records as $key => $record )
                             {{-- @if($record->role_id != 1) --}}
                             <tr>
                                <td> {{ $key+1}}</td>
                                <td>  <img src="{{asset('storage/'.$record->profile_photo_path)}}" alt=".." class="img-size-50 img-circle img-bordered-sm" width="50"></td>

                                <td>{{$record->name ?? 'NA' }} <br>
                                    <span class="badge bg-primary" >  {{ ucwords($record->role['name'] ?? "NA") }} </span>
                                </td>
                      
                                <td> {{$record->email ?? 'NA' }}</td>
                                <td> {{$record->websiteType['name'] ?? 'NA' }} </td>
                                <td>
                                    @php
                                        $assignedMenus = $record->assignedMenus;
                                    @endphp
                                    @forelse ($assignedMenus as $index => $assignedMenu)
                                        <span class="badge bg-dark"> {{ $assignedMenu->getmenu->category_en ?? 'NA'  }}</span>
                                        
                                    @empty
                                
                                    @endforelse
                                </td>
                          
                                <td>
                                    @if($record->status  == "1")
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
                                        {{-- <button class="btn btn-sm btn-success"  data-bs-toggle="modal" data-bs-target="#usermodel{{$record->id}}">
                                            <i class="fa fa-eye fa-fw"></i>
                                        </button> --}}
                                            {{-- viewDetail --}}
                                        <button   wire:click="viewDetail({{$record->id}})" class="btn btn-sm btn-primary" title="Edit"  wire:target="viewDetail({{ $record->id }})"  wire:loading.attr="disabled">
                                            <i class="fa fa-eye fa-fw"></i>
                                        </button>
                                                                           
                                        <button   wire:click="edit({{$record->id}})" class="btn btn-sm btn-primary" title="Edit"  wire:target="edit({{ $record->id }})"  wire:loading.attr="disabled"><i class="fa fa-edit fa-fw"></i></button>
                                        @role('admin')
                                        <button   class="btn btn-sm btn-danger" title="Delete" wire:click="delete({{ $record->id }})" wire:target="delete({{ $record->id }})"  wire:loading.attr="disabled"><i class="fa fa-times fa-fw fa-lg"></i></button>
                                        @endrole
                                </td>



                                @include('livewire.backend.add-users.usermodel')
                            </tr>

                            {{-- @endif --}}

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