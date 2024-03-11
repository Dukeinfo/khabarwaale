<?php

namespace App\Livewire\Backend\RoleAndPermissions;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class EditAllPermission extends Component
{
    use LivewireAlert;

    public $name;
    public $group_name;
    public $permissionId  , $permId;
    public function mount($id){
            $this->permissionId =  $id;
            $getPermissions =      Permission::where('id' ,$this->permissionId)->first();
            $this->permId =   $getPermissions->id;
            $this->name =  $getPermissions->name;
            $this->group_name =  $getPermissions->group_name;


    }
    public function render()
    {
        return view('livewire.backend.role-and-permissions.edit-all-permission');
    }

    public function UpdatePermission(){


        $role =  Permission::find($this->permId );
        $role->name = $this->name;
        $role->group_name = $this->group_name;
        $role->save();
    
        logActivity(
            'Permission',
            $role,
            [
                'Role id'    => $role->id,
                'Group  Name' => $role->group_name ,
            ],
            'Update',
            'Permission has been Updated!'
        );
        return redirect()->route('admin.view_permissions')->with($this->alert('success', 'ermission Updated Successfully !'));
    }
}
