<?php

namespace App\Livewire\Backend\Advertisment;

use App\Models\AddLocation;
use App\Models\Advertisment;
use App\Models\Category;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditAdd extends Component
{
    use WithFileUploads;
    use UploadTrait;
    use LivewireAlert;
    public $type  ='';
    public $thumbnail;
    public $page_name;
    public $slug;
    public $location;
    public $image ;    
    public $image_add;
    public $link_add;
    public $from_date;
    #[Rule('required | after_or_equal:from_date', message: 'To date field is required')] 
    public $to_date;
    public $post_month;
    public $sort_id;
    public $status;
    public $ip_address;
    public $login;
    public $add_Id;
    public $editimage ;
    public $editimage_add ;

    public function mount(Advertisment $addid){
        $this->add_Id = $addid->id;
        $this->page_name = $addid->page_name;
        $this->location = $addid->location;
        $this->image = $addid->image;
        $this->thumbnail =  $addid->thumbnail;
        $this->type = $addid->type;
        $this->image_add = $addid->image_add;
        $this->link_add = $addid->link_add;
        $this->from_date = $addid->from_date;
        $this->to_date = $addid->to_date;
        $this->post_month = $addid->post_month;
        $this->sort_id = $addid->sort_id;
        $this->status = $addid->status;


    }
    public function render()
    {
        $getCategory=  Category::where('status' ,'Active')->get();
        $get_add_location=  AddLocation::where('status' ,'Active')->orderby('name')->get();
        return view('livewire.backend.advertisment.edit-add',['getCategory' =>$getCategory, 'get_add_location' =>$get_add_location  ]);
    }

    public function updateadd(){
        $this->validate();
        if(!is_null($this->editimage)){
                $image =  $this->editimage;
                // Define folder path
                $folder = '/mainAdd';
                $editimage_add = $this->uploaadAdvertisment($image, $folder);
                $updateImg =  Advertisment::find($this->add_Id);

                $this->unlinkImage($updateImg, 'image', 'thumbnail', $folder);

                $updateImg->image = $editimage_add['file_name'];
                $updateImg->thumbnail = $editimage_add['thumbnail_name'] ;
                $updateImg->save();
          } 

          if(!is_null($this->editimage_add)){

                $image =  $this->editimage_add;
                // Define folder path
                $folder = '/image';
                $editimageadd = $this->uploadOne($image, $folder);
          
     
            } 

            $advertisment =  Advertisment::find($this->add_Id);
            $advertisment->page_name = $this->page_name;
            $advertisment->slug = createSlug($this->page_name);
            $advertisment->location = $this->location;
            $advertisment->type = $this->type;
            if(isset($this->editimage_add)){
                $advertisment->image_add = $editimageadd['file_name'] ?? Null;
                $advertisment->thumbnail2 = $editimageadd['thumbnail_name'] ?? Null;

                
                $advertisment->link_add = Null;
            }else{
                $advertisment->link_add = $this->link_add;
                $advertisment->image_add =  Null;

            }
            $advertisment->from_date = $this->from_date;
            $advertisment->to_date = $this->to_date;
            $advertisment->post_month = $this->post_month;
            $advertisment->sort_id = $this->sort_id;
            $advertisment->status = $this->status;
            $advertisment->ip_address =getUserIp();
            $advertisment->login = authUserId();
            $advertisment->save();


            logActivity(
                'Advertisment',
                $advertisment,
                [
                    'Add  id'    => $advertisment->id,
                    'location '  =>  $advertisment->location,
                ],
                'Update',
                'Advertisment has been Updated!'
            );
            $this->alert('success', 'Add updated successfully!');
            return redirect()->route('admin.create_add');
    }
}
