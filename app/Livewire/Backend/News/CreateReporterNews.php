<?php

namespace App\Livewire\Backend\News;

use App\Models\AssigneMenu;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\User;
use App\Models\WebsiteType;
use App\Traits\UploadTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateReporterNews extends Component
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
    #[Rule('required' , message: 'Heading 2 field is required')] 
    public $heading2;
    #[Rule('required|image' , message: 'Image field is required')] 
    public $image;
    public $thumbnail;
    public $caption;
    // #[Rule('mimes:pdf' , message: 'File should be pdf')] 
    public $pdf_file;
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

    public function mount(){
        // findOrFail
    }
    public function render()
    {
        if (empty($this->post_date)) {
            $this->post_date = now()->format('Y-m-d'); // Set to current date
        }

        if (empty($this->post_month)) {
            $this->post_month = date('F');
        }
        $getCategory =  AssigneMenu::where('user_id' , authUserId())->where('status' ,'Active')->get();
        $getwebsite_type =  User::where('id' , authUserId())->where('status' ,'1')->select('id','website_type_id')->get();


     
        return view('livewire.backend.news.create-reporter-news',['getCategory' =>$getCategory , 'getwebsite_type' =>$getwebsite_type]);
    }

    public function createReporterNews(){
            $this->validate();
            if(!is_null($this->image)){
                $image =  $this->image;
                $folder = '/news_gallery';
                $newsimage = $this->uploadOne($image, $folder);
        
              } 
              
              if(!is_null($this->pdf_file)){
                $pdffile =  $this->pdf_file;
                $pdffolder = '/pdf_docs';
                $newspdfFile = $this->uploadPdf($pdffile, $pdffolder);
              } 
      
              $createNews  = new NewsPost();
              $createNews->news_type = $this->news_type ?? null ;
              $createNews->category_id = $this->category_id ?? null ;
              $createNews->user_id = authUserId() ?? null ;
              $createNews->title = $this->title ?? null ;
              $createNews->slug = createSlug($this->title);
              $createNews->heading = $this->heading ?? null ;
              $createNews->heading2 = $this->heading2 ?? null ;
              $createNews->image = $newsimage['file_name'] ?? null ;
              $createNews->thumbnail = $newsimage['thumbnail_name'] ?? null ;
              $createNews->caption = $this->caption ?? null ;
              $createNews->pdf_file =  $newspdfFile  ?? null ;
              $createNews->news_description = trim($this->news_description) ?? null ;
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
              $createNews->post_date =$this->post_date  ?? null ;
              $createNews->post_month = $this->post_month ?? null ;
              $createNews->status =  'Pending' ?? null ;
              $createNews->ip_address =getUserIp();
              $createNews->login = authUserId();
              $createNews->save();
              $this->reset();
              $this->dispatch('formSubmitted');
              $this->alert('success', 'News Created successfully!');
              // return redirect()->route('admin.create_news')->with();
              
    }
}
