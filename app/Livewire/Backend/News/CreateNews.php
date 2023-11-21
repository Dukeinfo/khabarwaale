<?php

namespace App\Livewire\Backend\News;

use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Role;
use App\Models\User;
use App\Models\WebsiteType;
use App\Traits\UploadTrait;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
    protected $paginationTheme = 'bootstrap';
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

    public $type_search;
    public $category_search; // Add this property
    public $date_search; // Add this property
    public $queryTime; 
    



 public function filterByType()
 {
     $this->search = $this->type_search; // Store the selected news type
 }

 public function filterByCategpry(){
    $this->search = $this->category_search; // Store the selected news type

 }
 public function filterByDate(){
    $this->search = $this->date_search; // Store the selected news type

 }
 
 public function updatingSearch()
 {

     $this->resetPage();

 }

 #[On('reporterNewsCreated')] 
    public function render()
    {

        DB::enableQueryLog();

        if (empty($this->post_date)) {
            $this->post_date = now()->format('Y-m-d'); // Set to current date
        }

        if (empty($this->post_month)) {
            $this->post_month = date('F');
        }
        $totalrecords = NewsPost::count();
        $getRoles =  Role::get();
        $getCategory=  Category::where('status' ,'Active')->get();
        $getwebsite_type =  WebsiteType::where('status' ,'Active')->get();
        $trashdata = NewsPost::onlyTrashed()->get();

        $search = trim($this->search);
 

   // Store the selected news type

            $records = NewsPost::with(['newstype', 'user', 'getmenu'])
            ->where(function ($query) use ($search) {
                $query->whereHas('newstype', function ($typequery) use ($search) {
                    $typequery->where('name',  '=', $search) ;
                })->orWhereHas('user', function ($userquery) use ($search) {
                    $userquery->where('name',  '=', $search);
                })->orWhereHas('getmenu', function ($catquery) use ($search) {
                                $catquery->where('category_en', '=', $search);
                });
            })
            ->orWhereDate('post_date', $search) // Add this condition to filter by post_date
            ->orWhere('post_month', $search) //
            ->orWhere('title', 'like', '%' . $search . '%') 
            ->orWhere('status', 'like', '%' . $search . '%') 

            ->orderBy('category_id')
            ->latest()
            // ->get();
            ->paginate(20);
        $this->queryTime = collect(DB::getQueryLog())->sum('time');
        return view('livewire.backend.news.create-news' ,['totalrecords' => $totalrecords,
         'getwebsite_type' => $getwebsite_type,
          'getCategory' =>$getCategory,  
            'records' =>$records , 'trashdata' => $trashdata]);
    }

    public function createNews(){
        // dd( $this->news_description );
        $this->validate();
        if(!is_null($this->image)){

            $image =  $this->image;
            $folder = '/news_gallery';
            $newsimage = $this->uploadOne($image, $folder);
            // if( $this->gallery ){
            //     $this->image->storeAs('image_gallery',  $newsimage['file_name'] ,'public');
            // }

          } 
          if(!is_null($this->pdf_file)){
            $pdffile =  $this->pdf_file;
            $pdffolder = '/pdf_docs';
            $newspdf = $this->uploadPdf($pdffile, $pdffolder);
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
        $createNews->pdf_file =  $newspdf  ?? null ;
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

        $getimg  = NewsPost::onlyTrashed()->find($id);

        $imagePath = Storage::path('public/news_gallery/'. $getimg->image);
 
        if(File::exists($imagePath) && isset( $getimg->image)){
         
            unlink($imagePath);
        }
        if($getimg->thumbnail){
            $thumbnailPath = public_path('uploads/thumbnail/' .$getimg->thumbnail);
            if (file_exists($thumbnailPath)) {
                // dd(  $thumbnailPath);
                unlink($thumbnailPath);
            }
        }
        

        NewsPost::onlyTrashed()->find($id)->forceDelete(); 
        $this->alert('success', 'NewsPost Deleted successfully!');
    } catch (\Exception $e) {
        dd($e->getMessage());

    }

}
        public function archiveNewsPost($id)
        {
            $newsPost = NewsPost::find($id);

            if ($newsPost) {
                $newsPost->update(['archived_at' => now()]);
                $this->alert('success', 'News post archived successfully.');

            } else {
                $this->alert('success', 'News post not found');
                
            }
        }


        public function unarchiveNewsPost($id)
        {
            $newsPost = NewsPost::find($id);

            if ($newsPost) {
                $newsPost->update(['archived_at' => null]);
                $this->alert('success', 'News post unarchived successfully.');

            } else {
                $this->alert('success', 'News post not found.');

            }
        }


}
