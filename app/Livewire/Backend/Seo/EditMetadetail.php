<?php

namespace App\Livewire\Backend\Seo;

use App\Models\SeoMetadetail;
use App\Traits\UploadTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class EditMetadetail extends Component
{
    use WithFileUploads;
    use UploadTrait;
    use LivewireAlert;
    use WithPagination;
    public $seoMetadetail;
    public $metaDetail_id;
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


    public function mount(SeoMetadetail $id)
    {
        $this->seoMetadetail = $id;
        $this->metaDetail_id = $id->id;
        $this->slug = $id->slug;
        $this->meta_title = $id->meta_title;
        $this->meta_keyword = $id->meta_keyword;
        $this->meta_description = $id->meta_description;
        $this->meta_author = $id->meta_author;
        $this->google_analytics = $id->google_analytics;
        $this->google_verification = $id->google_verification;
        $this->alexa_analytics = $id->alexa_analytics;
        $this->sort_id = $id->sort_id;
        $this->status = $id->status;
    }
    public function render()
    {
        return view('livewire.backend.seo.edit-metadetail');
    }

    public function UpdateMetaDetail(){

        $seoMetadetail = SeoMetadetail::find($this->seoMetadetail->id);

        if ($seoMetadetail) {
            // $seoMetadetail->category_id = $this->category_id ?? null;
            $seoMetadetail->meta_title = $this->meta_title ?? null;
            $seoMetadetail->slug = createSlug($this->meta_title);
            $seoMetadetail->meta_keyword = $this->meta_keyword ?? null;
            $seoMetadetail->meta_description = $this->meta_description ?? null;
            $seoMetadetail->meta_author = $this->meta_author ?? null;
            $seoMetadetail->google_analytics = $this->google_analytics ?? null;
            $seoMetadetail->google_verification = $this->google_verification ?? null;
            $seoMetadetail->alexa_analytics = $this->alexa_analytics ?? null;
            $seoMetadetail->sort_id = $this->sort_id ?? null;
            $seoMetadetail->status = $this->status ?? null;
            $seoMetadetail->save();
    
            
            return redirect()->route('admin.createMetadetail')->with($this->alert('success', 'SeoMeta Updated successfully!'));
        } else {
            // Handle the case where the SeoMetadetail with the specified ID was not found.
            session()->flash('message', 'SeoMetadetail not found for update.');
        }


    }   
}
