<div>
    <!-- Your HTML layout goes here -->
    <div class="page-content">
        <!-- ... -->

        <div class="card">
            <div class="card-header bg-transparent border-bottom py-3">
                <h4 class="card-title">Edit Roles in Permission</h4>
                <p class="card-title-desc mb-0">Fill out the particulars in order to update.</p>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="rolePermissionUpdate">
                    <!-- Role details -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Role</label>
                                <h1>{{ $this->roleName }}</h1>
                                @error('selectedPermissions.*') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Permission checkboxes -->
      

                    @foreach ($permission_groups as $group)
                    <div class="row">
                        @php
                        $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                        @endphp
                        <div class="col-3">
                            <div class="form-group">
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input border border-dark" type="checkbox" value=""
                                    {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : ''  }}
                                        id="customckeck1">
                                    <label class="form-check-label" for="customckeck1">{{ $group->group_name }}</label>

                                    @if (App\Models\User::roleHasPermissions($role, $permissions))
                                    <i class="fas fa-check-circle text-success" style="font-size: 20px;"></i>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-9">
                            @foreach ($permissions as $permission)
                            <div class="form-group">
                                <div class="form-check mb-2 form-check-primary">
                                    <input class=""  wire:model="selectedPermissions.{{ $permission->id }}"
                                        type="checkbox" value="{{ $permission->id }}" id="customckeck{{ $permission->id }}"  
                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}  >
                                        
                                    <label class="form-check-label" for="customckeck{{ $permission->id }}">{{ $permission->name }}</label>
                                    @if ($role->hasPermissionTo($permission->name))
                                    <i class="fas fa-check-circle text-success" style="font-size: 20px;"></i>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            <br>
                        </div>
                    </div>
                    @endforeach

                    <!-- Submit button and loading indicator -->
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">Save Data</button>
                                <div wire:loading wire:target="rolePermissionUpdate">
                                    <i class="fas fa-1x fa-sync-alt fa-spin"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
