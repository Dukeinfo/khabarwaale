<?php

namespace App\Livewire\Backend\RoleAndPermissions;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Url;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class EditRoles extends Component
{
use LivewireAlert;

    public $name ,$role_id;
    public function mount($id){
            $getRoles =  Role::findById($id);
            $this->role_id =  $getRoles->id ;  
            $this->name =  $getRoles->name ;  

    }
    public function render()
    {
        return view('livewire.backend.role-and-permissions.edit-roles');
    }

    public function updateRole(){

        $role = Role::find($this->role_id);
        $role->name = $this->name;
        $role->save();
        return redirect()->route('admin.view_roles')->with($this->alert('success', 'Role Updated Successfully !'));

        $this->reset(['name',]);
    }
}
