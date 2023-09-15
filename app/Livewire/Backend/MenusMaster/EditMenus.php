<?php

namespace App\Livewire\Backend\MenusMaster;

use App\Livewire\Forms\CreateMenuForm;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;

class EditMenus extends Component
{
    use LivewireAlert;
    public CreateMenuForm $menuform;

    public function mount( Category $id){
        $this->menuform->setcategory($id);

    }
    public function render()
    {
        return view('livewire.backend.menus-master.edit-menus');
    }

    public function updateMenu(){
        sleep(1);
        $this->menuform->updateCategory();
        return redirect()->route('create_menus')->with( $this->alert('success', 'Menu Updated successfully!'));


    }
}
