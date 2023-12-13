


    <div>
    
        <div class="page-content">
            <div class="container-fluid">
    
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">View User Detail</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @role('admin')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom py-3">
                                <h4 class="card-title"> Users Detail</h4>

                            </div>
                            <div class="card-body">
                                <!--success or error alert-->
                
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row" width="30%" class="text-success">
                                                <h4>
                                                User name / UserName:
                                                </h4>
                                            </th>
                                            <td>
                                                <span class="text-primary">{{$record->name ?? 'NA'}}</span>
                                                <span class="badge bg-danger" style="font-size: 20px;">{{ $record->username ?? 'NA' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-success">     <h4>User Role: </h4></th>
                                            <td>
                                                <span class="badge bg-primary" style="font-size: 20px;">{{ ucwords($record->role['name'] ?? 'NA') }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-success">     <h4>User Email:</h4></th>
                                            <td>
                                                <span class="text-primary">{{$record->email ?? 'NA'}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-success">     <h4>User Password:</h4></th>
                                            <td>
                                                <span class="text-primary">{{$record->user_password ?? 'NA'}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-success">     <h4>User Mobile:</h4></th>
                                            <td>
                                                <span class="text-primary">{{$record->mobile ?? 'NA'}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-success">     <h4>User websiteType:</h4></th>
                                            <td>
                                                <span class="text-primary">{{$record->websiteType['name'] ?? 'NA'}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-success">     <h4>User About:</h4></th>
                                            <td>
                                                <span class="text-primary">{{$record->about ?? 'NA'}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-success">     <h4>User assignedMenus:</h4></th>
                                            <td>
                                                @php
                                                    $assignedMenus = $record->assignedMenus;
                                                @endphp
                                                @forelse ($assignedMenus as $index => $assignedMenu)
                                                    <span class="badge bg-dark my-2" style="font-size: 20px;">{{ $assignedMenu->getmenu->category_en ?? 'NA' }}</span>
                                                @empty
                                                 
                                                @endforelse
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                
                                <!--form starts-->
                         
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                @else
                <p class="text-center text-danger">Only Admin user can access this page </p>
                @endrole
                
         
                <!-- end row -->
    
    
                
            </div>
            <!-- container-fluid -->
        </div>
    </div>
    
    
    

    
