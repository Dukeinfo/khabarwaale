<?php

namespace App\Livewire\Backend\Seo;

use App\Models\SeoMetadetail;
use App\Traits\UploadTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class CreateMetadetail extends Component
{
    use WithFileUploads;
    use UploadTrait;
    use LivewireAlert;
    use WithPagination;
    public $category_id;
    public $slug;
    public $meta_title;
    public $meta_keyword;
    public $meta_description;
    public $meta_author;
    public $google_analytics;
    public $google_verification;
    public $alexa_analytics;
    public $sort_id;
    public $status = 'Active';
    public $ip_address;
    public $login;

    #[Url(as: 'q')]
    public $search = '';
    public function render()
    {

        $search = trim($this->search);
        $records = SeoMetadetail::where('meta_title', 'like', '%'.$search.'%')
        ->orwhere('meta_keyword', 'like', '%'.$search.'%')
        ->orwhere('meta_description', 'like', '%'.$search.'%')
        ->orwhere('sort_id', 'like', '%'.$search.'%')
        ->get();;

        $trashdata = SeoMetadetail::onlyTrashed()->get();
        
        return view('livewire.backend.seo.create-metadetail',['records' => $records ,'trashdata' =>$trashdata]);
    }

    public function submitMetaDetail(){

        $validatedData = $this->validate([
            'category_id' => 'nullable|integer',
            'slug' => 'nullable|string',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'meta_author' => 'nullable|string',
            'google_analytics' => 'nullable|string',
            'google_verification' => 'nullable|string',
            'alexa_analytics' => 'nullable|string',
            'sort_id' => 'required|integer',
            'status' => 'required|in:Active,Inactive',
        ]);
            if(  $validatedData){

                SeoMetadetail::create($validatedData);
                $this->reset();
                $this->alert('success', 'SeoMeta Created successfully!');
            }else{
                $this->alert('error', 'Something went wrong while storing the data');

            }

        }


            public function  inactive($id){
                $inactiveMetadetail = SeoMetadetail::find($id);
                $inactiveMetadetail->status = "Inactive";
                $inactiveMetadetail->save();
                $this->alert('info', 'Status Inactive successfully!');

            }
            public function  active($id){
                    $activeSeoMetadetail = SeoMetadetail::find($id);
                    $activeSeoMetadetail->status = "Active";
                    $activeSeoMetadetail->save();
                    $this->alert('success', 'Status Active successfully!');
            }

            public function  delete($id){
                try {
                    
                    $delSeoMetadetail = SeoMetadetail::findOrFail($id);
                    $delSeoMetadetail->delete();
                    $this->alert('warning', 'SeoMeta Deleted successfully!');
                    
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

            
         public function restore($id){
             try {
            
                $restore = SeoMetadetail::withTrashed()->find($id);
                $restore->restore();
                $this->alert('success', 'SeoMeta Restore successfully!');
                
             } catch (\Exception $e) {
                dd($e->getMessage());

             }
      }

        public function paramDelete($id){
                try {
                    SeoMetadetail::onlyTrashed()->find($id)->forceDelete(); 
                    $this->alert('success', 'SeoMeta Deleted successfully!');
                } catch (\Exception $e) {
                    dd($e->getMessage());

                }

        }
}
