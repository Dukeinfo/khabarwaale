<?php

namespace App\Livewire\Frontend\Advertisement;

use App\Models\User;
use Livewire\Component;

class EditorProfile extends Component
{
    public function render()
    {
      // {{ ucwords( auth()->user()->roles->pluck('name')[0] )?? '' }}
            // $reporterProfile =  User::where('role_id' ,'6')->where('status' ,1)->first();
            $reporterProfile =       User::whereHas('roles', function ($query) {
              $query->where('name', 'reporter');
          })->where('status', 1)->first();
        return view('livewire.frontend.advertisement.editor-profile' ,[
        'reporterProfile' =>$reporterProfile
    
      ]);
    }
}
