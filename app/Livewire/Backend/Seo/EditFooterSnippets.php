<?php

namespace App\Livewire\Backend\Seo;

use App\Models\SeoFootersnippet;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class EditFooterSnippets extends Component
{

    use LivewireAlert;
    use WithPagination;
    public $ootersnippetId;
    public $slug;
    public $title;
    public $description;
    public $sort_id;
    public $status;
    public $ip_address;
    public function mount($id = null)
    {
        if ($id) {
            $seoFootersnippet = SeoFootersnippet::find($id);

            if ($seoFootersnippet) {
                $this->ootersnippetId = $seoFootersnippet->id;
                $this->slug = $seoFootersnippet->slug;
                $this->title = $seoFootersnippet->title;
                $this->description = $seoFootersnippet->description;
                $this->sort_id = $seoFootersnippet->sort_id;
                $this->status = $seoFootersnippet->status;

            }
        }
    }
    public function render()
    {
        return view('livewire.backend.seo.edit-footer-snippets');
    }


    public function submitFooterSnippets(){
        $seoFootersnippet =  SeoFootersnippet::find($this->ootersnippetId);
        $seoFootersnippet->slug = createSlug($this->title);
        $seoFootersnippet->title = $this->title ?? null;
        $seoFootersnippet->description = $this->description ?? null;
        $seoFootersnippet->sort_id = $this->sort_id ?? null;
        $seoFootersnippet->status = $this->status ?? 'Active'; // Default value if not provided
        $seoFootersnippet->ip_address = $this->ip_address ?? null;
        $seoFootersnippet->save();
        return redirect()->route('admin.createfooterSnipped')->with( $this->alert('success', 'Header snippet Created successfully!'))  ;
    }
}
