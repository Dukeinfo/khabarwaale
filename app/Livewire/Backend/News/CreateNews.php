<?php

namespace App\Livewire\Backend\News;

use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Role;
use App\Models\User;
use App\Models\WebsiteType;
use App\Traits\UploadTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CreateNews extends Component
{
    use WithFileUploads;
    use UploadTrait;
    use LivewireAlert;
    use WithPagination;
    public $gerUsers = [];
    #[Rule('required' , message: 'News type field is required')] 
    public $news_type;
    #[Rule('required' , message: 'Category field is required')] 
    public $category_id;
    public $subcategory_id;
    #[Rule('required' , message: 'User field is required')] 
    public $user_id;
    // public $role_id;
    // public $reporter_id;
    // public $old_parm;
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
    #[Rule('required' )] 
    public $status;
    #[Url(as: 'q')]
    public $search = '';
    protected $queryString = ['search'];


  
    public function render()
    {

        if (empty($this->post_date)) {
            $this->post_date = now()->format('Y-m-d'); // Set to current date
        }

        if (empty($this->post_month)) {
            $this->post_month = date('F');
        }

        $search = trim($this->search);
        // $records = NewsPost::with(['newstype', 'user', 'getmenu'])
        // ->where(function ($query) use ($search) {
        //     $query->whereHas('newstype', function ($subquery) use ($search) {
        //         $subquery->where('name', 'like', '%' . $search . '%')
        //                 ->orWhere('title', 'like', '%' . $search . '%');
        //     })->orWhereHas('user', function ($subquery) use ($search) {
        //         $subquery->where('name', 'like', '%' . $search . '%');
        //     })->orWhereHas('getmenu', function ($subquery) use ($search) {
        //         $subquery->where('category_en', 'like', '%' . $search . '%')
        //                 ->orwhere('heading', 'like', '%' . $search . '%')
        //                 ->orWhere('post_month', 'like', '%' . $search . '%');
        //     });
        // })->orderby('category_id')->get();

        $records = NewsPost::with(['newstype', 'user', 'getmenu'])
        ->where(function ($query) use ($search) {
            $query->whereHas('newstype', function ($subquery) use ($search) {
                $subquery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('title', 'like', '%' . $search . '%');
            })->orWhereHas('user', function ($subquery) use ($search) {
                $subquery->where('name', 'like', '%' . $search . '%');
            })->orWhereHas('getmenu', function ($subquery) use ($search) {
                $subquery->where('category_en', 'like', '%' . $search . '%')
                        ->orWhere('heading', 'like', '%' . $search . '%')
                        ->orWhere('post_month', 'like', '%' . $search . '%')
                        ->orWhere(function ($monthSubquery) use ($search) {
                            $monthName = strtolower($search);
                            // You may need to adjust this mapping based on your localization.
                            $monthNameToNumber = [
                                'jan' => 1, 'feb' => 2, 'march' => 3, 'april' => 4,
                                'may' => 5, 'june' => 6, 'july' => 7, 'aug' => 8,
                                'sept' => 9, 'oct' => 10, 'nov' => 11, 'dec' => 12,
                            ];
                            if (array_key_exists($monthName, $monthNameToNumber)) {
                                $monthNumber = $monthNameToNumber[$monthName];
                                $monthSubquery->whereMonth('post_date', $monthNumber);
                            }
                        });
            });
        })->orderBy('category_id')->get();
    
        $totalrecords = NewsPost::count();
        $getRoles =  Role::get();
        $getCategory=  Category::where('status' ,'Active')->get();
        $getwebsite_type =  WebsiteType::where('status' ,'Active')->get();
        $trashdata = NewsPost::onlyTrashed()->get();


        return view('livewire.backend.news.create-news' ,['totalrecords' => $totalrecords,'getwebsite_type' => $getwebsite_type, 'getCategory' =>$getCategory,    'records' =>$records , 'trashdata' => $trashdata]);
    }

    public function createNews(){
        // dd( $this->news_description );
        $this->validate();
        if(!is_null($this->image)){
            $image =  $this->image;
            $folder = '/news_gallery';
            $newsimage = $this->uploadOne($image, $folder);
          } 
          if(!is_null($this->pdf_file)){

            $pdffile =  strtoupper(uniqid()) .'.'.$this->pdf_file->getClientOriginalExtension();
            $file =  $this->pdf_file->storeAs('pdf_files',$pdffile, 'public');
          } 
        $createNews  = new NewsPost();
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
        $createNews->image = $newsimage['file_name'] ?? null ;
        $createNews->thumbnail = $newsimage['thumbnail_name'] ?? null ;
        $createNews->caption = $this->caption ?? null ;
        $createNews->pdf_file =  $pdffile  ?? null ;
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
        $createNews->post_date = $this->post_date ?? null ;
        $createNews->post_month = $this->post_month ?? null ;
        $createNews->status =  $this->status ?? null ;
        $createNews->ip_address =getUserIp();
        $createNews->login = authUserId();
        $createNews->save();
        $this->reset();
        $this->alert('success', 'News Created successfully!');
        // return redirect()->route('admin.create_news')->with();
        $this->dispatch('formSubmitted');

       
    }

    public function handleChange()
    {
        $validNewsTypes = [1, 2, 3, 4];

     // Check if $this->news_type is a valid news type
     if (in_array($this->news_type, $validNewsTypes)) {
        $regularUsers = User::where('website_type_id', $this->news_type)->get();
        $adminUser = User::where('id', authUserId())->where('role_id', 1)->get();

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

    public function  rejected($id){
        $rejected = NewsPost::find($id);
        $rejected->status = "Rejected";
        $rejected->save();
        $this->alert('error', 'News Post Rejected !');

    }

    public function  approved($id){
            $approved = NewsPost::find($id);
            $approved->status = "Approved";
            $approved->save();
            $this->alert('success', 'News Post Approved!');
    }

    public function  pending($id){
        $pending = NewsPost::find($id);
        $pending->status = "Pending";
        $pending->save();
        $this->alert('warning', 'NewsPost status is  Pending !');
    }
    

    public function  delete($id){
        try {
            
            $findcat = NewsPost::findOrFail($id);
            $findcat->delete();
            $this->alert('warning', 'NewsPost Deleted successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());

        }

    }

    public function edit($id){
            try {
                return redirect()->route('admin.edit_news',['news_id' =>$id ]);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }

    }

    public function restore($id){
        try {
            
            $restore = NewsPost::withTrashed()->find($id);
            $restore->restore();
            $this->alert('success', 'NewsPost Restore successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());

        }
    }

public function paramDelete($id){
    try {
   NewsPost::onlyTrashed()->find($id)->forceDelete(); 
    $this->alert('success', 'NewsPost Deleted successfully!');
} catch (\Exception $e) {
    dd($e->getMessage());

}

}

}
