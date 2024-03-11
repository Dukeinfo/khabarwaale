<?php

namespace App\Livewire\Backend\Seo;

use App\Models\SeoFootersnippet;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CreateFooterSnippets extends Component
{

    use LivewireAlert;
    use WithPagination;
    public $category_id;
    public $slug;
    public $title;
    public $description;
    public $sort_id;
    public $status;
    public $ip_address;

    #[Url(as: 'q')]
    public $search = '';
    public function render()
    {
        
        $search = trim($this->search);
        $records = SeoFootersnippet::where('category_id', 'like', '%'.$search.'%')
                    ->orwhere('title', 'like', '%'.$search.'%')
                    ->orwhere('description', 'like', '%'.$search.'%')
                    ->orwhere('sort_id', 'like', '%'.$search.'%')
                    ->get();

        $trashdata = SeoFootersnippet::onlyTrashed()->get();
        return view('livewire.backend.seo.create-footer-snippets',['records' => $records , 'trashdata' =>$trashdata] );
    }


    public function submitFooterSnippets(){
        $validatedData = $this->validate([
            'title' => 'required|string',
            'description' => 'required|string', // Adjust the validation rules as needed
            'sort_id' => 'required|integer',
    
            'status' => 'required|in:Active,Inactive',

        ]);
        $seoFootersnippet = new SeoFootersnippet;
        $seoFootersnippet->slug = createSlug($this->title);
        $seoFootersnippet->title = $this->title ?? null;
        $seoFootersnippet->description = $this->description ?? null;
        $seoFootersnippet->sort_id = $this->sort_id ?? null;
        $seoFootersnippet->status = $this->status ?? 'Active'; // Default value if not provided
        $seoFootersnippet->ip_address = $this->ip_address ?? null;
        $seoFootersnippet->save();
        
        logActivity(
            'SeoFootersnippet',
            $seoFootersnippet,
            [
                'Footer snippet  id'    => $seoFootersnippet->id,
                'Footer title' => $seoFootersnippet->title ,
            ],
            'Create',
            'Footer snippet has been Created!'
        );

        $this->alert('success', 'Header snippet Created successfully!');

        $this->reset();
    }
    public function  inactive($id){
        $inactiveMetadetail = SeoFootersnippet::find($id);
        $inactiveMetadetail->status = "Inactive";
        $inactiveMetadetail->save();

        logActivity(
            'SeoFootersnippet',
            $inactiveMetadetail,
            [
                'Footer snippet  id'    => $inactiveMetadetail->id,
                'Footer title' => $inactiveMetadetail->title ,
            ],
            'Inactive',
            'Footer snippet has been inactive!'
        );
        $this->alert('info', 'Status Inactive successfully!');

    }
    public function  active($id){
            $activeSeoMetadetail = SeoFootersnippet::find($id);
            $activeSeoMetadetail->status = "Active";
            $activeSeoMetadetail->save();

            logActivity(
                'SeoFootersnippet',
                $activeSeoMetadetail,
                [
                    'Footer snippet  id'    => $activeSeoMetadetail->id,
                    'Footer title' => $activeSeoMetadetail->title ,
                ],
                'Active',
                'Footer snippet has been active!'
            );
            $this->alert('success', 'Status Active successfully!');
    }

    public function  delete($id){
        try {
            
            $delSeoMetadetail = SeoFootersnippet::findOrFail($id);

            logActivity(
                'SeoFootersnippet',
                $delSeoMetadetail,
                [
                    'Footer snippet  id'    => $delSeoMetadetail->id,
                    'Footer title' => $delSeoMetadetail->title ,
                ],
                'Delete',
                'Footer snippet has been Deleted!'
            );

            $delSeoMetadetail->delete();
            $this->alert('warning', 'Header snippet Deleted successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());

        }

    }

    public function edit($id){
            try {
                return redirect()->route('admin.editfooterSnipped',['id' =>$id ]);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }

    }

    
 public function restore($id){
     try {
    
        $restore = SeoFootersnippet::withTrashed()->find($id);
        $restore->restore();
        $this->alert('success', 'Header snippet Restore successfully!');
        
     } catch (\Exception $e) {
        dd($e->getMessage());

     }
}

public function paramDelete($id){
        try {
            SeoFootersnippet::onlyTrashed()->find($id)->forceDelete(); 
            $this->alert('success', 'Header snippet Deleted successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());

        }

}
}
