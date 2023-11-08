<?php

namespace App\Livewire\Frontend\Advertisement;

use App\Models\User;
use Livewire\Component;

class EditorProfile extends Component
{
    public function render()
    {
            $reporterProfile =  User::where('role_id' ,'6')->where('status' ,1)->first();
        return view('livewire.frontend.advertisement.editor-profile' ,[
        'reporterProfile' =>$reporterProfile
    
      ]);
    }
}
