<?php

namespace App\Livewire\Backend\Settings;

use App\Models\ContactInfo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;

class ContactusView extends Component
{

    use WithFileUploads;
    use LivewireAlert;
    public $contactId;
    public $email;
    public $phone;
    public $address;
    public $logo;
    public $disclaimer;
    public $footer_logo;
    public $website ;
    public $alternate_phone ;
    public $address2 ;
    #[Url()] 
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        $search = trim($this->search);

        return view('livewire.backend.settings.contactus-view',[
            'contacts' => ContactInfo::where('email', 'like', '%'.$search.'%')
            ->orwhere('phone', 'like', '%' . $search. '%')
            ->orwhere('address', 'like', '%' . $search. '%')
            ->get(),
        ]);
    }

    public function store()
    {
     

        // Validate the input data
        $validatedData = $this->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'disclaimer' => 'required|string',

            'website' => 'required|string',
            'alternate_phone' =>'nullable|string',
            'address2' => 'nullable|string',
        ]);

        // Handle the logo file upload (if provided)

        // Create a new ContactInformation instance and save it to the database
        if (isset($this->footer_logo)) {
            $logoPath = $this->footer_logo->store('logos', 'public');

        }
        $contact = new ContactInfo();
        $contact->footer_logo = $logoPath?? Null;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->alternate_phone = $this->alternate_phone;
        $contact->address = $this->address;
        $contact->address2 = $this->address2;
        $contact->disclaimer = $this->disclaimer;
        $contact->website = $this->website;
         $contact->save();
     

        // Emit an event to notify the parent component (if needed)


        // Reset the form fields after successful data storage
        $this->resetFields();

        // Redirect back or wherever you want after successful data storage
        $this->alert('success', ' Contact information stored successfully');
        


    }

    private function resetFields()
    {
        $this->email = '';
        $this->phone = '';
        $this->alternate_phone = '';
        $this->address = '';
        $this->address2 = '';
        $this->footer_logo = null;
        $this->disclaimer = '';
        $this->website = '';
    }
    public function edit($id)
    {
         
        try {
            return redirect()->route('contact_edit',['id' =>$id ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function delete($id)
    {
        $contact = ContactInfo::findOrFail($id);
        $contact->delete();
        session()->flash('success', 'Contact information deleted successfully!');
    }
}
