<?php

namespace App\Livewire\Backend\Settings;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminProfile extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    
    public $userId , $name ,$email ,$profile ,$profile_photo_path;
    public $old_pass, $password ,$password_confirmation;

    public function mount(){
        if (Auth::check()) {
            // Use $userId as needed
            $Getuser = User::where('id' , Auth::id())->first();
            $this->userId = $Getuser->id;
            $this->name = $Getuser->name;
            $this->email = $Getuser->email;
            $this->profile_photo_path = $Getuser->profile_photo_path;

        }
    }
    public function updateadminProfile(){
 
        if(!is_null($this->profile)){
            $fileName = time().'_'.$this->profile->getClientOriginalName();
        
            $filePath = $this->profile->storeAs('uploads', $fileName, 'public');
            $updateuser =  User::find( $this->userId);
            $updateuser->profile_photo_path = $fileName;
            $updateuser->name = $this->name;
            $updateuser->email = $this->email;
            $updateuser->save();    
            logActivity(
                'User',
                $updateuser,
                [
                    'User id'    => $updateuser->id,
                    'User Name' => $updateuser->name ,
                ],
                'Update',
                'User profile has been Updated!'
            );
            
            $this->alert('success', ' Profile updated Successfully');

        }else{
            $updateuser =  User::find( $this->userId);
            $updateuser->name = $this->name;
            $updateuser->email = $this->email;
            $updateuser->save();    
            logActivity(
                'User',
                $updateuser,
                [
                    'User id'    => $updateuser->id,
                    'User Name' => $updateuser->name ,
                ],
                'Update',
                'User  has been Updated!'
            );
            $this->alert('success', 'Profile updated Successfully');
        }

            return redirect()->route('admin_dashboard');
    }
    public function resetPassword(){
        $validateData = $this->validate([
            'old_pass'=> 'required',
            'password' => 'required|confirmed'
         
        ]);
    //password save part 
        $hashedPassword =Auth::user()->password;
        //if else start 
        if(Hash::check($this->old_pass,$hashedPassword)){

            $user =User::find(Auth::id());
            $user->password=Hash::make($this->password);
            $user->save();

            logActivity(
                'User',
                $user,
                [
                    'User id'    => $user->id,
                    'User Name' => $user->name ,
                ],
                'Update',
                'User password  has been updated!'
            );
      
            Auth::logout();

            $this->alert('success', 'Password Changed Successfully!');
   
            return redirect()->route('login');
         
         
        }else{

            $this->alert('warning', 'Invalid password entered');
            
            return redirect()->back();

        }
        
    }
    public function render()
    {
        return view('livewire.backend.settings.admin-profile');
    }
}
