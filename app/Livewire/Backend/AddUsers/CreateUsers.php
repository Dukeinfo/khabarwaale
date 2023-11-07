<?php

namespace App\Livewire\Backend\AddUsers;

use App\Livewire\Forms\CreateUserForm;
use App\Models\AssigneMenu;
use App\Models\Category;
// use App\Models\Role;
use App\Models\User;
use App\Models\WebsiteType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateUsers extends Component
{
    // public CreateUserForm $userForm;
use WithFileUploads;
use LivewireAlert;

    public $name;
    public $role_id;
    public $username;
    public $email;
  
    public $password;
    public $password_confirmation;
    public $name_hin;
    public $name_pbi;
    public $name_urdu;
    public $menus =[];

    public $about;
    public $mobile;
    public $city;
    public $state;
    public $country;
    public $address;
    public $email_verified_at;
    public $current_team_id;
    public $profile_photo_path;
    public $status;
    public $website_type_id ;
    #[Url(as: 'q')]
    public $search = '';
    protected $queryString = ['search'];
    public function render()
    {
        $search =  trim($this->search);
            $records = User::with(['websiteType' ,'assignedMenus'])
                    ->where(function ($query) use ($search) {
                         $query->whereHas('websiteType', function ($subquery) use ($search) {
                        $subquery->where('name', 'like', '%' . $search . '%');
                    })->orwhere('name', 'like', '%'.$search.'%')
                    ->orwhere('username', 'like', '%'.$search.'%')
                    ->orwhere('email', 'like', '%'.$search.'%');
                    })->get();
             $getRoles =  Role::get();
             $getCategory=  Category::where('status' ,'Active')->get();
             $getwebsite_type =  WebsiteType::where('status' ,'Active')->get();

        return view('livewire.backend.add-users.create-users' ,['getwebsite_type' =>$getwebsite_type,'getCategory' => $getCategory,'getRoles' => $getRoles,'records' =>$records]);
    }


    public function CreateUsers(){
        if (empty( $this->role_id)) {
            $this->alert('error', 'Role field is also required!');

        }
        $this->validate([
            'website_type_id' => 'required',
            'name' => 'required|string|max:255',
            'role_id' => 'required|integer', // Assuming role_id is numeric
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|confirmed|min:8', // Adjust the minimum password length as needed
            'menus' => 'required|array', // You can require this field to be an array
            'about' => 'required|string',
            'mobile' => 'required|string|max:20', // Adjust the maximum mobile length as needed
            'address' => 'required|string|max:255',
            'profile_photo_path' => 'image|max:1024', // Adjust the max file size as needed
            'status' => 'required', // Ensure status is one of the specified values
        ]);
        
        if(!is_null($this->profile_photo_path)){
            $fileName = time().'_'.$this->profile_photo_path->getClientOriginalName();
        
            $filePath = $this->profile_photo_path->storeAs('uploads', $fileName, 'public');
      

        }

        // $menus = [];
        // foreach ($this->menus as $key => $value) {
        //     if ($value === true) {
        //         $menus[] = $key;
        //     }
        // }
        //  dd($menus);
   
        $role = Role::where('id', $this->role_id)->where('guard_name', 'web')->first();
        if ($role) {

    
            //  $menusJson = json_encode($this->menus);
            $createuser =new User();            
            $createuser->name = $this->name; 
            $createuser->website_type_id = $this->website_type_id; 
            $createuser->role_id = $this->role_id ;
            $createuser->username = $this->username;
            $createuser->email = $this->email;
            $createuser->password =  Hash::make($this->password);
            $createuser->name_hin = $this->name_hin;
            $createuser->name_pbi = $this->name_pbi;
            $createuser->name_urdu = $this->name_urdu;
            // $createuser->menus =  $menusJson ;// Convert array to comma-separated string
            $createuser->about = $this->about;
            $createuser->mobile = $this->mobile;
            $createuser->address = $this->address;
            $createuser->profile_photo_path = $filePath ?? Null;
            $createuser->status = $this->status;
          
            // $createuser->roles()->detach();
        //     if($this->role_id){
        //        $createuser->assignRole($this->role_id);
        //    }

           // Save the user to the database
                $createuser->save();
              $createuser->assignRole($role);
            } else {
                // Handle the case where the role is not found in the 'web' guard
                // You can log an error, show a message, or take other actions.
                // For example:
                Log::error('Role not found in web guard for role ID: ' . $this->role_id);
                        $this->alert('error', 'Role not found');

            }


            // $menus[] =$this->menus;
            $assignments = [];
            foreach ($this->menus as $key => $value) {
                if ($value === true) {
                    $assignments[] = [
                        'user_id' => $createuser->id,
                        'role_id' => $this->role_id,
                        'category_id' => $key,
                    ];
                }
            }
            //  dd($assignments);
            AssigneMenu::insert($assignments);
            $this->reset(); 
            $this->alert('success', 'User Created successfully!');

    }
    public function  inactive($id){
        $finduser = User::find($id);
        $finduser->status = "0";
        $finduser->save();
        $this->alert('info', 'User Inactive successfully!');

}
public function  active($id){
        $finduser = User::find($id);
        $finduser->status = "1";
        $finduser->save();
        $this->alert('success', 'User Active successfully!');
}
    public function  delete($id){
        try {
            
            $findcat = User::findOrFail($id);
            $findcat->delete();
            $this->alert('warning', 'User Deleted successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());

        }

   }

   public function edit($id){
    try {
        return redirect()->route('edit_user',['userid' =>$id ]);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }

}
}
