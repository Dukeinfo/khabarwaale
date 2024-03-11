<?php

namespace App\Livewire\Backend\News;

use App\Models\AssigneMenu;
use App\Models\NewsPost;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class EditReporterNews extends Component
{
    use WithFileUploads;
    use UploadTrait;
    use LivewireAlert;
    #[Rule('required' , message: 'News type field is required')] 
    public $news_type;
    #[Rule('required' , message: 'Category field is required')] 
    public $category_id;
    #[Rule('required' , message: 'Title field is required')] 
    public $title;
    public $slug;
    #[Rule('required' , message: 'Heading field is required')] 
    public $heading;
    public $heading2;
    public $image;
    public $thumbnail;
    public $caption;
    // #[Rule('mimes:pdf' , message: 'File should be pdf')] 
    public $pdf_file ,$editpdf_file;
    #[Rule('required' , message: 'News Description field is required')] 
    public $news_description;

    public $slider = true;
    public $breaking_top  = true;
    public $breaking_side  = true;
    public $top_stories  = true;
    public $gallery  = true;
    public $more  = true;
    public $send_noti  = true;
    public $metatags;
    public $description;
    public $keywords;
    public $Approved ;
    public $reject_reason;
    #[Rule('required' , message: 'Post date field is required')] 
    public $post_date;
    #[Rule('required', message: 'Post Month field is required' )] 
    public $post_month;
    public $reporterNews_Id;


    public function mount(  $news_id){
       
        // findOrFail
        try {
        $reporterNews = NewsPost::where('user_id' , authUserId())->where('status', 'Approved')->findOrFail($news_id);
      
        $this->reporterNews_Id = $reporterNews->id ?? null ;
        $this->news_type = $reporterNews->news_type ?? null ;
        $this->category_id = $reporterNews->category_id ?? null ;
        $this->title = $reporterNews->title ?? null ;
        $this->heading = $reporterNews->heading ?? null ;
        $this->heading2 = $reporterNews->heading2 ?? null ;
        $this->caption = $reporterNews->caption ?? null ;
        $this->news_description = $reporterNews->news_description ?? null ;
        $this->slider =$reporterNews->slider ? true : false ;
        $this->breaking_top = $reporterNews->breaking_top ? true : false ; 
        $this->breaking_side = $reporterNews->breaking_side ? true : false ;
        $this->top_stories =  $reporterNews->top_stories ? true : false ;
        $this->gallery = $reporterNews->gallery ? true : false ;
        $this->more = $reporterNews->more ? true : false ;
        $this->send_noti = $reporterNews->send_noti ? true : false  ;
        $this->metatags = $reporterNews->metatags ?? null ;
        $this->description = $reporterNews->description ?? null ;
        $this->keywords = $reporterNews->keywords ?? null ;
        $this->reject_reason = $reporterNews->reject_reason ?? null ;
        $this->post_date = $reporterNews->post_date ?? null ;
        $this->post_month = $reporterNews->post_month ?? null ;
 
    } catch (ModelNotFoundException $e) {
        // Handle the exception (e.g., log it or display an error message)
        // You can also redirect the user to an error page or take other appropriate actions.
        session()->flash('error', 'News not found');
   
        return redirect()->route('admin.create_news')->with($this->alert('error', 'News not found'));
    }
    

    }
    public function render()
    {
        $getCategory =  AssigneMenu::where('user_id' , authUserId())->where('status' ,'Active')->get();
        $getwebsite_type =  User::where('id' , authUserId())->where('status' ,'1')->select('id','website_type_id')->get();

        return view('livewire.backend.news.edit-reporter-news' ,[
            'getCategory' =>$getCategory ,
            'getwebsite_type' =>$getwebsite_type,
        ]);
    }

    public function updateReporterNews(){
   
        $this->validate();
        if(!is_null($this->image)){

            $model = NewsPost::find($this->reporterNews_Id );
            $this->unlinkNewsImage($model, 'image', 'thumbnail');
            
            $image =  $this->image;
            $folder = '/news_gallery';
            $newsimage = $this->uploadOne($image, $folder);

    
          } 
          if(!is_null($this->editpdf_file)){

            $model = NewsPost::find($this->reporterNews_Id );
            $this->unlink_pdf_file($model, 'pdf_file');

            $editpdffile =  $this->editpdf_file;
            $pdffolder = '/pdf_docs';
            $editnewspdf = $this->uploadPdf($editpdffile, $pdffolder);
          } 

        $createNews  =  NewsPost::find( $this->reporterNews_Id );
        $createNews->news_type = $this->news_type ?? null ;
        $createNews->category_id = $this->category_id ?? null ;
        $createNews->user_id = authUserId() ?? null ;
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
        
        $createNews->post_date = $this->post_date ?? null ;
        $createNews->post_month = $this->post_month ?? null ;
        
        $createNews->ip_address = getUserIp();
        $createNews->login = authUserId();
        $createNews->save();

        logActivity(
            'News',
            $createNews,
            [
                'News id'    => $createNews->id,
                'News Type'  => get_websiteType($createNews->news_type),
                'News Category' => $createNews->category_id ,
            ],
            'Update',
            'News has been Updated!'
        );
        $this->alert('success', 'News updated successfully!');
        return redirect()->route('admin.create_news');

  
                
    }
}
