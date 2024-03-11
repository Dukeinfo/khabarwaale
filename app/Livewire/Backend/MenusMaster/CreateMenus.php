<?php

namespace App\Livewire\Backend\MenusMaster;

use App\Livewire\Forms\CreateMenuForm;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;
use Livewire\Component;
// use Livewire\Attributes\Lazy;
// #[Lazy]

class CreateMenus extends Component
{
    use LivewireAlert;
    public CreateMenuForm $menuform;
     #[Url(as: 'q')]
     public $search = '';
    
    public function render()
    {

   
        $search =  trim($this->search);
        $records = Category::where('category_en', 'like', '%'.$search.'%')
                    ->orwhere('category_hin', 'like', '%'.$search.'%')
                    ->orwhere('category_pbi', 'like', '%'.$search.'%')
                    ->orwhere('category_urdu', 'like', '%'.$search.'%')
                    ->get();
        return view('livewire.backend.menus-master.create-menus' , [ 'records' => $records ]);
    }
    public function storeData(){
        $this->menuform->savemenus();
        $this->alert('success', 'Menu created successfully', [
            'toast' => false,
            'position' => 'center'
        ]);
    }

       public function  inactive($id){
                $findcat = Category::find($id);
                $findcat->status = "Inactive";
                $findcat->save();
                $this->alert('info', 'Menu Inactive successfully!');

       }
       public function  active($id){
                $findcat = Category::find($id);
                $findcat->status = "Active";
                $findcat->save();
                $this->alert('success', 'Menu Active successfully!');
       }
    
       public function  delete($id){
            try {
                
                $findcat = Category::findOrFail($id);

                logActivity(
                    'Category',
                    $findcat,
                    [
                        'Category id'    => $findcat->id,
                        'Category Name ' => $findcat->category_en ,
                    ],
                    'Delete',
                    'Category has been deleteed!'
                );
                $findcat->delete();
                $this->alert('warning', 'Menu Deleted successfully!');
                
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
