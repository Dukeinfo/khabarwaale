<?php

namespace App\Livewire\Backend\RoleAndPermissions;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class EditRolesPermissions extends Component
{


    use LivewireAlert;

    public $role_id;
    public $permissionAll = false;
    public $selectedPermissions = [];
    public $permission_groups;
    public $roleName, $roleId;
    public function mount($id)
    {
        $this->roleId = $id;

        $role = Role::findOrFail($id);
        $this->roleName = $role->name;

        $this->permission_groups = User::getpermissionGroups();

        $permissions = Permission::get();
        foreach($permissions as  $permission){

            $this->selectedPermissions[$permission->id ] =  $role->hasPermissionTo($permission->name);
        }

        
    }
    public function render()
    {
      
        
        $role = Role::findOrFail($this->roleId);
        $permissions = Permission::get();

        return view('livewire.backend.role-and-permissions.edit-roles-permissions', [
            'role' =>$role,
            'permissions' => $permissions ,

        ]);
    }


    public function rolePermissionUpdate(){
        
        $this->validate([
            'selectedPermissions.*' => 'boolean',
        ]);

        $role = Role::find($this->roleId);
        $permissions = array_keys(array_filter($this->selectedPermissions));

        try {
            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }
            return redirect()->route('admin.add_roles')->with($this->alert('warning', 'Role Permission updated Successfully'));
            // You can also redirect to another page here
        } catch (\Exception $e) {
            $this->alert('error', 'An error occurred while adding role permissions.');
            // You can log the error or perform other error-handling actions here
        }

    }
}
