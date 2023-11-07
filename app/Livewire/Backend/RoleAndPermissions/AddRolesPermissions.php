<?php

namespace App\Livewire\Backend\RoleAndPermissions;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AddRolesPermissions extends Component
{
use LivewireAlert;

    public $role_id;
    public $permissionAll = false;
    public $selectedPermissions = [];
    public $permission_groups;
    
    public  function mount(){
        $this->permission_groups =  User::getpermissionGroups();
    }
    
    public function render()
    {
            $getRoles =    Role::get();
            $getPermissions =   Permission::get();
            

            return view('livewire.backend.role-and-permissions.add-roles-permissions' , [
                'getRoles' => $getRoles , 
                'getPermissions' => $getPermissions ,

        ] );
    }

    
    public function storeROlePermission(){

        // dd($this->all());
        $this->validate([
            'role_id' => 'required',
        ]);
        $role = Role::find($this->role_id);

        if (!$role) {
                $this->alert('error', 'Role not found');
            return;
        }


        $data = [];
        foreach ($this->selectedPermissions as $key => $value) {
            if ($value === true) {
                $data[] = [
                    'role_id' => $this->role_id,
                    'permission_id' => $key,
                ];
            }
        }
        
        try {
            DB::table('role_has_permissions')->insert($data);
            return redirect()->route('admin.add_roles')->with($this->alert('warning', 'Role Permission Added Successfully'))  ;

        } catch (\Exception $e) {
            $this->alert('error', 'An error occurred while adding role permissions.');
            // You can log the error or perform other error-handling actions here
        }
        //  dd($assignments);
   
 


        // $this->reset();


    }

    public function selectAllToggle()
    {
        if ($this->permissionAll) {
            $this->selectedPermissions = $this->permission_groups->pluck('id')->map(function($id) {
                return (string) $id;
            })->toArray();
        } else {
            $this->selectedPermissions = [];
        }


    }

// Edit admin.edit_roles_permissions
public function edit($id){
    try {
        return redirect()->route('admin.edit_roles_permissions',['id' =>$id ]);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }

}

    // Delete 

    public function  delete($id){
        try {
            $role = Role::findOrFail($id);
            if (!is_null($role)) {
               $role->delete();
            }
    
         
         
            $this->alert('warning', 'Role Permission Deleted Successfull');
            
        } catch (\Exception $e) {
            dd($e->getMessage());

        }

    }
    

}
