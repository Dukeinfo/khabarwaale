<?php

namespace App\Livewire\Backend\RoleAndPermissions;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AddRolesPermissions extends Component
{
    public function render()
    {
            $getRoles =    Role::get();
            $getPermissions =   Permission::get();
            $permission_groups =  User::getpermissionGroups();

            return view('livewire.backend.role-and-permissions.add-roles-permissions' , [
                'getRoles' => $getRoles , 
                'getPermissions' => $getPermissions ,
                'permission_groups' =>$permission_groups

        ] );
    }
}
