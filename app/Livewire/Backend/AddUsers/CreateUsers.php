<?php

namespace App\Livewire\Backend\AddUsers;

use App\Livewire\Forms\CreateUserForm;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;

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

    #[Url(as: 'q')]
    public $search = '';
    protected $queryString = ['search'];
    public function render()
    {
        $search =  trim($this->search);
                $records = User::where('name', 'like', '%'.$search.'%')
                ->orwhere('username', 'like', '%'.$search.'%')
                ->orwhere('email', 'like', '%'.$search.'%')
                ->get();
             $getRoles =  Role::get();
             $getCategory=  Category::where('status' ,'Active')->get();

        return view('livewire.backend.add-users.create-users' ,['getCategory' => $getCategory,'getRoles' => $getRoles,'records' =>$records]);
    }


    public function CreateUsers(){

        $this->validate([
            'name' => 'required|string|max:255',
            'role_id' => 'required|numeric', // Assuming role_id is numeric
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

        $menus = [];
        foreach ($this->menus as $key => $value) {
            if ($value === true) {
                $menus[] = $key;
            }
        }
        //  dd($menus);

        $menusJson = json_encode($menus);


            $createuser =new User();
            $createuser->name = $this->name; 
            $createuser->role_id = $this->role_id ;
            $createuser->username = $this->username;
            $createuser->email = $this->email;
            $createuser->password =  Hash::make($this->password);
            $createuser->name_hin = $this->name_hin;
            $createuser->name_pbi = $this->name_pbi;
            $createuser->name_urdu = $this->name_urdu;
            $createuser->menus =  $menusJson ;// Convert array to comma-separated string
            $createuser->about = $this->about;
            $createuser->mobile = $this->mobile;
            $createuser->address = $this->address;
            $createuser->profile_photo_path = $filePath ?? Null;
            $createuser->status = $this->status;
            $createuser->save();
        $this->reset(); 

        $this->alert('success', 'User Created successfully!');

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
        return redirect()->route('edit_menus',['id' =>$id ]);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }

}
}
