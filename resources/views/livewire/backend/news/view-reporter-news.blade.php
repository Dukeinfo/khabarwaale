<div>


    <div class="page-content">
        <div class="container-fluid">
            

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
                             <p class="text-success fw-bold">      Query took {{ $queryTime ?? '' }} seconds.</p>

                            <span class="badge bg-success p-2  fs-4">Total news : {{ $totalnews ?? '0'}} </span>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable-- table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>image</th>
                                            <th>Add Type</th>
                                            <th>Category </th>
                                            <th>User </th>
                                            <th>Post Date </th>
                                            <th>Post Month </th>
                                            <th>Status</th>    
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                    @forelse ($reporterRecords as $key =>  $reporter_news )
                                                        <tr>
                                                            <td>
                                                                {{ $key+1}} 

                                                            </td>
                                                            <td>
                                                                <img src="{{ isset($reporter_news->thumbnail) ? getThumbnail($reporter_news->thumbnail) : asset('no_image.jpg')}}" alt=".." class="img-size-50  img-bordered-sm rounded-circle" width="50">

                                                            </td>
                                                            <td>
                                                               {{ ucwords($reporter_news->newstype['name']) ?? 'NA' }}

                                                            </td>
                                                            <td>
                                                                <span class="badge bg-dark p-1"> {{ $reporter_news->getmenu['category_en'] ?? 'NA'  }}</span>

                                                            </td>
                                                            <td>
                                                                <span class="badge bg-success p-1"> {{$reporter_news->user['name'] ?? 'NA' }}  </span><br>

                                                            </td>
                                                            
                                                            <td>{{ $reporter_news->post_date }}</td>
                                                            <td>{{ $reporter_news->post_month }}</td>
                                                            <td>
                                                                @if($reporter_news->status  == "Approved")
                                                                <a href="javascript:void(0)" >
                                                                    <span class="badge bg-success" > Approved</span>
                                                                </a> 
                                                            @elseif($reporter_news->status  == "Rejected")
                                                            <a href="javascript:void(0)" >
                                                                <span class="badge bg-danger" >Rejected   </span>
                                                            </a> 
                                                            @else
                                                                <a href="javascript:void(0)" >
                                                                    <span class="badge bg-warning" >  Pending </span>
                                                                </a> 
                                                            </td>
                                                            @endif
                                                            <td>
                                                                <button class="btn btn-sm btn-success" title="View news" data-bs-toggle="modal" data-bs-target="#reporterModal{{$reporter_news->id}}">
                                                                    <i class="fa fa-eye fa-fw"></i></button>
                                                                <button class="btn btn-sm btn-primary" title="Edit News" wire:click="editReporterNews({{$reporter_news->id}})" wire:target="editReporterNews({{ $reporter_news->id }})"  wire:loading.attr="disabled">
                                                                    <i class="fa fa-edit fa-fw" ></i></button>
                                                            </td>
                                                        </tr>


                                                     @include('livewire.backend.news.reporterModel') 


                                                    @empty
                                                        
                                                    @endforelse    
       

                                    </tbody>
                                </table>
                                {{-- end table  --}}
              

                            </div>
                        </div>
                     </div>
                </div>
            </div>
        
            <!-- container-fluid -->
        </div>
    </div>
</div>



