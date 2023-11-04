<?php

namespace App\Livewire\Backend\RoleAndPermissions;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class ViewAllPermission extends Component
{
use LivewireAlert;

    #[Url(as: 'q')]
    public $search = '';
    #[Rule('required' , message: 'Name field is required')] 
    public $name;
    #[Rule('required' , message: 'Group name field is required')] 
    public $group_name;
    public function render()
    {
    
        $search =  trim($this->search);
        $permissions = Permission::where('name', 'like', '%' . $search . '%')
                                ->orwhere('group_name', 'like', '%' . $search . '%')->get();

        return view('livewire.backend.role-and-permissions.view-all-permission' ,['permissions' =>$permissions]);
    }

    public function addPermission()
    {
        $this->validate();
        $role = new Permission();
        $role->name = $this->name;
        $role->group_name = $this->group_name;
        $role->save();
        $this->alert('success', 'ermission Inserted Successfully !');
        $this->reset(['name', 'group_name']);
    }


    public function  delete($id){
        try {
            
            $delete = Permission::findOrFail($id);
            $delete->delete();
            $this->alert('warning', 'permission  Deleted successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());

        }

    }

    public function edit($id){
            try {
                return redirect()->route('admin.edit_permissions',['id' =>$id ]);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }

    }
    
}
