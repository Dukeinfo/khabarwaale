<?php

namespace App\Livewire\Backend\Settings;

use App\Models\ContactInfo;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class ContactusEdit extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $contactId;
    public $email;
    public $phone;
    public $address;
    public $logo;
    public $disclaimer;
    public $footer_logo;
    public $editfooter_logo;
    public $contactinfoId;

    
    public $search;
    public $website ;
    public $alternate_phone ;
    public $address2 ;
    public function mount($id)
    {
        $this->contactId = $id;
        if ($this->contactId) {
            $contact = ContactInfo::findOrFail($this->contactId);
            $this->contactinfoId = $contact->id;
            $this->email = $contact->email;

            $this->phone = $contact->phone;
            $this->alternate_phone = $contact->alternate_phone;
            $this->footer_logo = $contact->footer_logo;
            $this->address = $contact->address;
            $this->address2 = $contact->address2;
            $this->disclaimer = $contact->disclaimer;
            $this->website = $contact->website;
        }
    }


    public function render()
    {
        return view('livewire.backend.settings.contactus-edit');
    }


    public function update(){
        if (isset($this->editfooter_logo)) {
            $logoPath = $this->editfooter_logo->store('logos', 'public');
            $contact =  ContactInfo::findOrFail($this->contactinfoId);
            $contact->footer_logo = $logoPath?? Null;
            $contact->email = $this->email;
            $contact->phone = $this->phone;
            $contact->alternate_phone = $this->alternate_phone;
            $contact->address = $this->address;
            $contact->address2 = $this->address2;
            $contact->disclaimer = $this->disclaimer;
            $contact->website = $this->website;
             $contact->save();

             logActivity(
                'ContactInfo',
                $contact,
                [
                    'Contact id'    => $contact->id,
                    'Contact email' => $contact->email ,
                ],
                'Update',
                'Contact logos  has been updated!'
            );

        }else{
            $contact = ContactInfo::findOrFail($this->contactinfoId);
 
            $contact->email = $this->email;
            $contact->phone = $this->phone;
            $contact->alternate_phone = $this->alternate_phone;
            $contact->address = $this->address;
            $contact->address2 = $this->address2;
            $contact->disclaimer = $this->disclaimer;
            $contact->website = $this->website;
             $contact->save();

             logActivity(
                'ContactInfo',
                $contact,
                [
                    'Contact id'    => $contact->id,
                    'Contact email' => $contact->email ,
                ],
                'Update',
                'Contact info  has been updated!'
            );
        }
        $this->alert('success', ' Address updated Successfully');

            return redirect()->route('contact_view');
    }
}
