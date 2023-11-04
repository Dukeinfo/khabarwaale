<?php

namespace App\Livewire\Backend\RoleAndPermissions;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Attributes\Url;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class ViewRoles extends Component
{
use LivewireAlert;

    #[Url(as: 'q')]
    public $search = '';
    #[Rule('required' , message: 'Name field is required')] 
    public $name;

    public function render()
    {
        $search =  trim($this->search);
        $getRoles = Role::where('name', 'like', '%' . $search . '%')->get();
        return view('livewire.backend.role-and-permissions.view-roles' ,[
            'getRoles' => $getRoles
        ]);
    }


public function createRole(){


    $this->validate();
    $role = new Role();
    $role->name = $this->name;
    $role->save();
    $this->alert('success', 'Role Inserted Successfully !');
    $this->reset(['name',]);

}


    
    public function  delete($id){
        try {
            
            $delete = Role::findOrFail($id);
            $delete->delete();
            $this->alert('warning', 'Role  Deleted successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());

        }

    }

    public function edit($id){
            try {
                return redirect()->route('admin.edit_roles',['id' =>$id ]);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }

    }
    
}
