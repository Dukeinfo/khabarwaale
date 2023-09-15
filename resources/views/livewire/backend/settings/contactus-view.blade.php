<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Get Connected</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Contact us </li>
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
                            <h4 class="card-title">Manage Get Connected </h4>
                        </div>

                        
                        <div class="card-body">
                            @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                         
                          
                            <div class="row ">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom py-3">
                                            <h4 class="card-title">Update Contact </h4>
                                        </div>
                                        <div class="card-body">
                                            <input type="search" class="form-control" wire:model.live="search" placeholder="Search here ..." >
                
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Footer Logo</th>
                                                 
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($contacts as $contact)
                                                        <tr>
                                                            <td>{{ $contact->email }}</td>
                                                            <td>{{ $contact->phone }}</td>
                                                            <td>{{ $contact->address }}</td>
                                                            <td>
                                                                @if ($contact->footer_logo)
                                                                    <img src="{{ asset('storage/' . $contact->footer_logo) }}" alt="Logo" width="100">
                                                                @endif
                                                            </td>
                                               
                                                            <td>
                                                                <button wire:click="edit({{ $contact->id }})" class="btn btn-sm btn-primary">Edit</button>
                                                                <button wire:click="delete({{ $contact->id }})" class="btn btn-sm btn-danger">Delete</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>               
                        <form wire:submit="store" enctype="multipart/form-data">

                            <!--form starts-->
                            <div class="row g-3">
                           
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="" wire:model.live="email" placeholder="Email">
                                        @error('email') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">phone</label>
                                        <input type="text" class="form-control" id="" wire:model.live="phone"  placeholder="phone" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                        @error('phone') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Alternate Phone</label>
                                        <input type="text" class="form-control" id="" wire:model.live="alternate_phone"  placeholder="Alternate Phone" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                        @error('alternate_phone') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" id="" wire:model.live="address"  placeholder="Address">
                                        @error('address') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" id="" wire:model.live="address2"  placeholder="Address">
                                        @error('address2') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">logo</label>
                                        <input type="file" class="form-control" id="" wire:model.live="footer_logo" >
                                        @error('footer_logo') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                         
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Desclaimer</label>
                                        <textarea  rows="5" cols="5" class="form-control" id="" wire:model.live="disclaimer" placeholder="Footer Desclaimer" ></textarea>
                                        @error('disclaimer') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">website</label>
                                        <input type="url" class="form-control" id="" wire:model.live="website" >
                            
                                        @error('website') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>


                      

                                <div>
                                    <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md">Update Profile</button>
                                </div>
                                <div wire:loading wire:target="updateadminProfile">
                                     <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
          
          
            <!-- end row -->


            
        </div>
        <!-- container-fluid -->
    </div>
   
</div>
