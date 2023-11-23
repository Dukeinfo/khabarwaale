<?php

namespace App\Livewire\Backend\News;

use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Role;
use App\Models\User;
use App\Models\WebsiteType;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditNews extends Component
{
    use WithFileUploads;
    use UploadTrait;
    use LivewireAlert;
    public $gerUsers = [];
    public $news_type;
    public $category_id;
    public $subcategory_id;
    public $user_id;
    // public $role_id;
    // public $reporter_id;
    // public $old_parm;
    public $title;
    public $slug;
    public $heading;
    public $heading2;
    public $image;
    public $thumbnail;
    public $caption;
    // #[Rule('mimes:pdf' , message: 'File should be pdf')] 
    public  $pdf_file ,$editpdf_file;

    public $news_description;

    public $slider;
    public $breaking_top;
    public $breaking_side;
    public $top_stories;
    public $gallery;
    public $more;
    public $send_noti;
    public $metatags;
    public $description;
    public $keywords;
    public $Approved;
    public $reject_reason;
    public $post_date;
    public $post_month;
    public $status;

    public $news_Id;
    public     $dbimage ;
    public     $dbthumbnail ;
    public function mount(  $news_id){


        $newspoat = NewsPost::findOrFail($news_id);
        $this->news_Id = $newspoat->id ?? null ;
        $this->news_type = $newspoat->news_type ?? null ;
        $this->category_id = $newspoat->category_id ?? null ;
        $this->subcategory_id = $newspoat->subcategory_id ?? null ;
        $this->user_id = $newspoat->user_id ?? null ;
        $this->title = $newspoat->title ?? null ;
        $this->heading = $newspoat->heading ?? null ;
        $this->heading2 = $newspoat->heading2 ?? null ;

        $this->dbimage = $newspoat->image ?? null ;
        $this->dbthumbnail = $newspoat->thumbnail ?? null ;

        $this->caption = $newspoat->caption ?? null ;
        $this->pdf_file = $newspoat->pdf_file ?? null ;

        
        $this->news_description = $newspoat->news_description ?? null ;
        $this->slider =$newspoat->slider ? true : false ;
        $this->breaking_top = $newspoat->breaking_top ? true : false ; 
        $this->breaking_side = $newspoat->breaking_side ? true : false ;
        $this->top_stories =  $newspoat->top_stories ? true : false ;
        $this->gallery = $newspoat->gallery ? true : false ;
        $this->more = $newspoat->more ? true : false ;
        $this->send_noti = $newspoat->send_noti ? true : false  ;
        $this->metatags = $newspoat->metatags ?? null ;
        $this->description = $newspoat->description ?? null ;
        $this->keywords = $newspoat->keywords ?? null ;
        $this->reject_reason = $newspoat->reject_reason ?? null ;
        $this->post_date = $newspoat->post_date ?? null ;
        $this->post_month = $newspoat->post_month ?? null ;
        $this->status =  $newspoat->status ?? null ;
        if ($this->news_type) {
            $this->gerUsers = User::where('website_type_id', $this->news_type)->get();
            $adminUser = User::where('id', authUserId())->get();
            if ($adminUser->isNotEmpty()) {
                $this->gerUsers = $adminUser->concat( $this->gerUsers );
            } else {
                // Admin user not found with the specified role_id
                $this->gerUsers =  $this->gerUsers ;
            }
        } 
        else {
            // Clear the user list if no news_type is selected
            $this->gerUsers = [];
        }
    }
    public function render()
    {
        $getRoles =  Role::get();
        $getCategory=  Category::where('status' ,'Active')->get();
        $getwebsite_type =  WebsiteType::where('status' ,'Active')->get();
        return view('livewire.backend.news.edit-news' , ['getRoles' => $getRoles , 'getCategory' => $getCategory , 'getwebsite_type' => $getwebsite_type ]);
    }
    public function handleChange()
    {
        $validNewsTypes = [1, 2, 3, 4];

     // Check if $this->news_type is a valid news type
     if (in_array($this->news_type, $validNewsTypes)) {
        $regularUsers = User::where('website_type_id', $this->news_type)->get();
        $adminUser = User::where('id', authUserId())->get();

        // Include admin user in all conditions and check role_id
        if ($adminUser->isNotEmpty()) {
            $this->gerUsers = $adminUser->concat($regularUsers);
        } else {
            // Admin user not found with the specified role_id
            $this->gerUsers = $regularUsers;
        }
    } else {
        // Clear the user list if no news_type is selected or an invalid value is provided
        $this->gerUsers = [];
    }
  
    }

    

    public function updateNews(){
        if(!is_null($this->image)){
            $model = NewsPost::find($this->news_Id );
            $this->unlinkNewsImage($model, 'image', 'thumbnail');

            $image =  $this->image;
            $folder = '/news_gallery';
            $newsimage = $this->uploadOne($image, $folder);

          } 
 

        if(!is_null($this->editpdf_file)){

            $model = NewsPost::find($this->news_Id );
            $this->unlink_pdf_file($model, 'pdf_file');

            $editpdffile =  $this->editpdf_file;
            $pdffolder = '/pdf_docs';
            $editnewspdf = $this->uploadPdf($editpdffile, $pdffolder);
          } 
        $createNews  =  NewsPost::find( $this->news_Id );
        $createNews->news_type = $this->news_type ?? null ;
        $createNews->category_id = $this->category_id ?? null ;
        $createNews->subcategory_id = $this->subcategory_id ?? null ;
        $createNews->user_id = $this->user_id ?? null ;
        $createNews->role_id = $this->role_id ?? null ;
        $createNews->reporter_id = $this->reporter_id ?? null ;
        $createNews->old_parm = $this->old_parm ?? null ;
        $createNews->title = $this->title ?? null ;
        $createNews->slug = createSlug($this->title);
        $createNews->heading = $this->heading ?? null ;
        $createNews->heading2 = $this->heading2 ?? null ;
        if(isset($this->image)){

            $createNews->image = $newsimage['file_name'] ?? null ;
            $createNews->thumbnail = $newsimage['thumbnail_name'] ?? null ;
        }
        $createNews->caption = $this->caption ?? null ;
        if( isset($this->editpdf_file)){

            $createNews->pdf_file =  $editnewspdf  ?? null ;
        }
        $createNews->news_description = $this->news_description ?? null ;

        $createNews->slider =$this->slider ? 'Show' : Null ;
        $createNews->breaking_top = $this->breaking_top ? 'Show' : Null ; 
        $createNews->breaking_side = $this->breaking_side ? 'Show' : Null ;
        $createNews->top_stories =  $this->top_stories ? 'Show' : Null ;
        $createNews->gallery = $this->gallery ? 'Show' : Null ;
        $createNews->more = $this->more ? 'Show' : Null ;
        $createNews->send_noti = $this->send_noti ? 'Show' : Null  ;
        
        $createNews->metatags = $this->metatags ?? null ;
        $createNews->description = $this->description ?? null ;
        $createNews->keywords = $this->keywords ?? null ;

        $createNews->reject_reason = $this->reject_reason ?? null ;
        
        $createNews->post_date = $this->post_date ?? null ;
        $createNews->post_month = $this->post_month ?? null ;
        
        $createNews->status =  $this->status ?? null ;
        $createNews->ip_address =getUserIp();
        $createNews->login = authUserId();
        $createNews->save();
        $this->alert('success', 'News updated successfully!');
        return redirect()->route('admin.create_news');
    }

}
