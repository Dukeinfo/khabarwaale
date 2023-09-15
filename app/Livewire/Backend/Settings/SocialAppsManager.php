<?php

namespace App\Livewire\Backend\Settings;
use App\Models\SocialApp;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SocialAppsManager extends Component
{
    use LivewireAlert;

    use WithFileUploads;

    public $name;
    public $link;
    public $logo;
    public $icon; // Add the icon field
    public $selectedId;
    public $isEditing = false;

    protected $rules = [
        'name' => 'required|string',
        'link' => 'required|url',
        // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // 'icon' => 'nullable|string|max:255',
    ];
    public function render()
    {
        $socialApps = SocialApp::all();
        return view('livewire.backend.settings.social-apps-manager', ['socialApps' =>$socialApps]);
    }
    public function create()
    {
        $this->resetValidation();
        $this->resetFields();
        $this->isEditing = false;
    }

    
public function store()
{
    $this->validate();

    if ($this->logo) {
        $logoPath = $this->logo->store('logos', 'public');
    }

    SocialApp::create([
        'name' => $this->name,
        'link' => $this->link,
        'icon' => $this->icon, 
        'logo' => isset($logoPath) ? $logoPath : null,
    ]);

    $this->resetFields();
    $this->alert('success', ' Social app created successfully!y');

}

public function edit($id)
{
    $socialApp = SocialApp::findOrFail($id);

    $this->selectedId = $socialApp->id;
    $this->name = $socialApp->name;
    $this->link = $socialApp->link;
    $this->icon = $socialApp->icon;
    $this->logo = null; // Clear the uploaded logo
    $this->isEditing = true;
}

public function update()
{
    $this->validate();

    $socialApp = SocialApp::findOrFail($this->selectedId);

    $logoPath = null;
    if ($this->logo) {
        $logoPath = $this->logo->store('logos', 'public');
    }

    $socialApp->update([
        'name' => $this->name,
        'link' => $this->link,
        'icon' => $this->icon,

        'logo' => isset($logoPath) ? $logoPath : $socialApp->logo,
    ]);

    $this->resetFields();
    $this->isEditing = false;
    $this->alert('success', ' Social app created successfully!');

}

public function delete($id)
{
    $socialApp = SocialApp::findOrFail($id);
    $socialApp->delete();
    $this->alert('warning', ' Social app deleted successfully!y');

}

private function resetFields()
{
    $this->name = '';
    $this->link = '';
    $this->logo = null;
    $this->icon = '';

}
}
