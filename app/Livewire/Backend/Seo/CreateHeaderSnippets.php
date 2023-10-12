<?php

namespace App\Livewire\Backend\Seo;

use App\Models\SeoHeadersnippet;
use App\Traits\UploadTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class CreateHeaderSnippets extends Component
{
    use WithFileUploads;
    use UploadTrait;
    use LivewireAlert;
    use WithPagination;
    public $category_id;
    public $slug;
    public $category;
    public $description;
    public $sort_id;
    public $status;
    public $ip_address;

    #[Url(as: 'q')]
    public $search = '';
    public function render()
    {

        $search = trim($this->search);
        $records = SeoHeadersnippet::where('category_id', 'like', '%'.$search.'%')
                    ->orwhere('category', 'like', '%'.$search.'%')
                    ->orwhere('description', 'like', '%'.$search.'%')
                    ->orwhere('sort_id', 'like', '%'.$search.'%')
                    ->get();

        $trashdata = SeoHeadersnippet::onlyTrashed()->get();
        return view('livewire.backend.seo.create-header-snippets' ,
        ['records' =>$records , 
        'trashdata' =>$trashdata]);
    }


    public function submitheaderrSnippets(){
        $validatedData = $this->validate([
            'category' => 'required|string',
            'description' => 'required|string',
            'sort_id' => 'required|integer',
            'status' => 'required|in:Active,Inactive',
        ]);

        $newSeoHeadersnippet = new SeoHeadersnippet();
        $newSeoHeadersnippet->slug = createSlug($this->category);
        $newSeoHeadersnippet->category = $this->category ?? null;
        $newSeoHeadersnippet->description = $this->description ?? null;
        $newSeoHeadersnippet->sort_id = $this->sort_id ?? null;
        $newSeoHeadersnippet->status = $this->status ?? null;
        $newSeoHeadersnippet->ip_address = getUserIp() ?? null;
        $newSeoHeadersnippet->save();
        // You can also add a success message or other actions here if needed.
        $this->alert('success', 'Header snippet Created successfully!');
        $this->reset();
        
    }

    public function  inactive($id){
        $inactiveMetadetail = SeoHeadersnippet::find($id);
        $inactiveMetadetail->status = "Inactive";
        $inactiveMetadetail->save();
        $this->alert('info', 'Status Inactive successfully!');

    }
    public function  active($id){
            $activeSeoMetadetail = SeoHeadersnippet::find($id);
            $activeSeoMetadetail->status = "Active";
            $activeSeoMetadetail->save();
            $this->alert('success', 'Status Active successfully!');
    }

    public function  delete($id){
        try {
            
            $delSeoMetadetail = SeoHeadersnippet::findOrFail($id);
            $delSeoMetadetail->delete();
            $this->alert('warning', 'Header snippet Deleted successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());

        }

    }

    public function edit($id){
            try {
                return redirect()->route('admin.editeaderSnipped',['id' =>$id ]);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }

    }

    
 public function restore($id){
     try {
    
        $restore = SeoHeadersnippet::withTrashed()->find($id);
        $restore->restore();
        $this->alert('success', 'Header snippet Restore successfully!');
        
     } catch (\Exception $e) {
        dd($e->getMessage());

     }
}

public function paramDelete($id){
        try {
            SeoHeadersnippet::onlyTrashed()->find($id)->forceDelete(); 
            $this->alert('success', 'Header snippet Deleted successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());

        }

}
}
