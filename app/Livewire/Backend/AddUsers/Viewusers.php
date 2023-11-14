<?php

namespace App\Livewire\Backend\AddUsers;

use App\Models\User;
use Livewire\Component;

class Viewusers extends Component
{
    public $userId;
    public function mount( $id){
        $userDetail =      User::findOrFail($id);
        $this->userId =  $userDetail->id;

}

    public function render()
    {
        $record = User::with(['websiteType' ,'assignedMenus'])->where('id' ,  $this->userId)->first();
        return view('livewire.backend.add-users.viewusers' ,['record' =>$record]);
    }
}
