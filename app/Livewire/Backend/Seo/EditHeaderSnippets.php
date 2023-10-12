<?php

namespace App\Livewire\Backend\Seo;

use App\Models\SeoHeadersnippet;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class EditHeaderSnippets extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $category_id;
    public $slug;
    public $category;
    public $description;
    public $sort_id;
    public $status;
    public $ip_address;

    public function mount($id = null)
    {
        if ($id) {
            // Load an existing SeoHeadersnippet for editing
            $seoHeadersnippet = SeoHeadersnippet::find($id);

            if ($seoHeadersnippet) {
                $this->category_id = $seoHeadersnippet->id;
                $this->slug = $seoHeadersnippet->slug;
                $this->category = $seoHeadersnippet->category;
                $this->description = $seoHeadersnippet->description;
                $this->sort_id = $seoHeadersnippet->sort_id;
                $this->status = $seoHeadersnippet->status;
                $this->ip_address = $seoHeadersnippet->ip_address;
            }
        }
    }

    public function render()
    {
        return view('livewire.backend.seo.edit-header-snippets');
    }


    public function updateHeaderrSnippets(){
        $newSeoHeadersnippet =  SeoHeadersnippet::find($this->category_id);
        $newSeoHeadersnippet->slug = createSlug($this->category);
        $newSeoHeadersnippet->category = $this->category ?? null;
        $newSeoHeadersnippet->description = $this->description ?? null;
        $newSeoHeadersnippet->sort_id = $this->sort_id ?? null;
        $newSeoHeadersnippet->status = $this->status ?? null;
        $newSeoHeadersnippet->ip_address = getUserIp() ?? null;
        $newSeoHeadersnippet->save();
        

        return redirect()->route('admin.createHeaderSnipped')->with($this->alert('success', 'Header Snippets Created successfully!'));
    }
}
