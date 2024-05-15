<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">View Activity </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Activity</li>
                                <li class="breadcrumb-item active">Activity</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            {{-- ======================table ========================= --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">


                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Manage Activity</h4>
                            @hasanyrole('Super Admin|admin')
                                <button type="button" class="btn btn-danger" wire:click="deleteAll"
                                    wire:loading.attr="disabled" wire:target="deleteAll">
                                    Delete all
                                </button>
                                <button type="button" class="btn btn-info" wire:click="checkAll"
                                    wire:loading.attr="disabled" wire:target="checkAll">
                                    Check all
                                </button>
                            @else
                                I do not have all of these roles or have more other roles...
                            @endhasanyrole
                            <i class="fas fa-1x fa-sync-alt fa-spin" wire:loading wire:target="deleteAll"></i>
                            <div class="col-md-3 float-end">
                                <div class="form-group">

                                    <div class="mb-3">
                                        <label class="form-label">Search</label>
                                        <input type="testS" class="form-control" wire:model.live="search"
                                            placeholder="Search...">
                                        @error('Search')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable--">
                                    <h4> Total : {{count($getTotal) ?? ''}}</h4>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Log Name</th>
                                            <th>Description</th>
                                            <th>Event</th>
                                            <th>Properties</th>
                                            <th>Created at</th>
                                            <th>Causer By</th>
                                            @hasanyrole('Super Admin|admin')
                                                <th class="text-center">Action</th>
                                            @else
                                            @endhasanyrole

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php   $i =0;  @endphp
                                        @forelse ($activityLogs as $activityLog)
                                            <tr>
                                                <th scope="row">{{ $i }} <input type="checkbox"
                                                        wire:model="logId" value="{{ $activityLog->id }}"></th>
                                                <td>{{ $activityLog->log_name ?? '' }}</td>
                                                <td>{{ $activityLog->description ?? '' }}</td>
                                                {{-- <td>{{ $activityLog->subject_type ?? ''  }}</td> --}}
                                                <td>{{ $activityLog->event ?? '' }}</td>
                                                <td>
                                                    @if ($activityLog->properties)
                                                        @php
                                                            $properties = json_decode($activityLog->properties, true);
                                                        @endphp
                                                        <ul>
                                                            @foreach ($properties as $key => $value)
                                                                <li>{{ $key }}: {{ $value }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p>No properties available.</p>
                                                    @endif


                                                </td>
                                                <td>{{ $activityLog->created_at->diffForHumans() ?? '' }}</td>
                                                <td>
                                                    @if ($activityLog->causer_type == 'App\Models\User')
                                                        @php
                                                            $user = \App\Models\User::find($activityLog->causer_id);
                                                        @endphp

                                                        @if ($user)
                                                            {{ $user->name }}
                                                        @else
                                                            User not found
                                                        @endif
                                                    @else
                                                        {{ $activityLog->causer_type }}
                                                    @endif

                                                </td>


                                                <td class="text-center">
                                                    @hasanyrole('Super Admin|admin')
                                                        <button class="btn btn-sm btn-danger" wire:loading.attr="disabled"
                                                            wire:target="delete({{ $activityLog->id }})"
                                                            wire:click.prevent="delete({{ $activityLog->id }})">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    @endhasanyrole
                                                </td>
                                            </tr>
                                            @php  $i++;  @endphp
                                        @empty
                                        @endforelse

                                    </tbody>
                                </table>

                                {{ $activityLogs->links() }}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- table .row end  -->
        </div>

    </div>
</div>
