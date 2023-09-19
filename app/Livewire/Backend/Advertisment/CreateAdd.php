<?php

namespace App\Livewire\Backend\Advertisment;

use App\Livewire\Forms\CreateAddForm;
use App\Models\AddLocation;
use App\Models\Advertisment;
use App\Models\Category;
use App\Traits\UploadTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Attributes\Rule;

class CreateAdd extends Component
{
    use WithFileUploads;
    use UploadTrait;
    use LivewireAlert;

    public $type  ='';

    public $thumbnail;
    #[Rule('required|min:3', message: 'page name field is required')] 
    public $page_name;
    public $slug;
    #[Rule('required', message: 'Location field is required')] 
    public $location;
    #[Rule('required', message: 'Image field is required')] 
    public $image ;
    // #[Rule('required', message: 'page name field is required')] 
    
    public $image_add;
    public $link_add;
    #[Rule('required', message: 'From Date field is required')] 
    public $from_date;
    #[Rule('required', message: 'To date field is required')] 
    public $to_date;
    #[Rule('required', message: 'Month field is required')] 
    public $post_month;
    #[Rule('required', message: 'Sort id field is required')] 
    public $sort_id;
    #[Rule('required', message: 'Status field is required')] 
    public $status;
    public $ip_address;
    public $login;
    #[Url(as: 'q')]
    public $search = '';
    protected $queryString = ['search'];
    public function render()
    {
        $getCategory=  Category::where('status' ,'Active')->get();
        $getAddLocation=  AddLocation::where('status' ,'Active')->orderby('name')->get();

        $search =  trim($this->search);
        $records = Advertisment::where('location', 'like', '%'.$search.'%')
        ->orwhere('page_name', 'like', '%'.$search.'%')
        ->orwhere('type', 'like', '%'.$search.'%')
        ->orwhere('from_date', 'like', '%'.$search.'%')
        ->orwhere('to_date', 'like', '%'.$search.'%')
        ->orwhere('post_month', 'like', '%'.$search.'%')
        ->get();
        return view('livewire.backend.advertisment.create-add',['get_add_location' => $getAddLocation,'records' => $records,'getCategory' => $getCategory]);
    }

    public function CreateAdd(){
     
        $this->validate();
        if(!is_null($this->image_add)){
            $image =  $this->image_add;
            // Define folder path
            $folder = '/imageadd';
            $image_add = $this->uploadOne($image, $folder);
    
          } 
          if(!is_null($this->image)){
            $image =  $this->image;
            // Define folder path
            $folder = '/addpic';
            $imageadd = $this->uploadOne($image, $folder);
    
          } 
        $model = new Advertisment();
        $model->page_name = $this->page_name;
        $model->slug = createSlug($this->page_name);
        $model->location = $this->location;
        $model->image = $imageadd['file_name'];
        $model->thumbnail = $imageadd['thumbnail_name'];

        $model->type = $this->type;
        $model->image_add = $image_add['file_name'];
        $model->link_add = $this->link_add;
        $model->from_date = $this->from_date;
        $model->to_date = $this->to_date;
        $model->post_month = $this->post_month;
        $model->sort_id = $this->sort_id;
        $model->status = $this->status;
        $model->ip_address =getUserIp();
        $model->login = authUserId();
    
        // Save the model to the database
        $model->save();
        $this->alert('success', 'Add Created successfully!');


    }
        public function  inactive($id){
            $findcat = Advertisment::find($id);
            $findcat->status = "Inactive";
            $findcat->save();
            $this->alert('info', 'Advertisment Inactive successfully!');

        }
        public function  active($id){
                $findcat = Advertisment::find($id);
                $findcat->status = "Active";
                $findcat->save();
                $this->alert('success', 'Advertisment Active successfully!');
        }

        public function  delete($id){
            try {
                
                $findcat = Advertisment::findOrFail($id);
                $findcat->delete();
                $this->alert('warning', 'Advertisment Deleted successfully!');
                
            } catch (\Exception $e) {
                dd($e->getMessage());

            }

        }

        public function edit($id){
                try {
                    return redirect()->route('admin.edit_add',['addid' =>$id ]);
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }

        }
}
