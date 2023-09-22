<?php

namespace App\Livewire\Backend\News;

use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Role;
use App\Models\User;
use App\Models\WebsiteType;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;

class CreateNews extends Component
{

    public $gerUsers = [];

    #[Rule('required')] 
    public $news_type;
    #[Rule('required')] 
    public $category_id;

    #[Rule('required')] 
    public $subcategory_id;

    #[Rule('required')] 
    public $user_id;
    

    public $role_id;


    public $reporter_id;
    

    public $old_parm;
    
    #[Rule('required')] 
    public $title;

    public $slug;

    #[Rule('required')] 
    public $heading;

    #[Rule('required')] 
    public $heading2;

    #[Rule('required')] 
    public $image;

    public $thumbnail;

    public $caption;

    public $pdf_file;

    #[Rule('required')] 
    public $news_description;

    #[Rule('required')] 
    public $checkbox;
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
    #[Rule('required')] 
    public $post_date;
    #[Rule('required')] 
    public $post_month;
    #[Rule('required')] 
    public $status;
    #[Url(as: 'q')]
    public $search = '';
    protected $queryString = ['search'];

    public function render()
    {
        $search =  trim($this->search);
        $records = NewsPost::where('news_type', 'like', '%'.$search.'%')
        ->orwhere('title', 'like', '%'.$search.'%')
        ->orwhere('user_id', 'like', '%'.$search.'%')
        ->orwhere('heading', 'like', '%'.$search.'%')
        ->orwhere('post_month', 'like', '%'.$search.'%')
        ->get();
        $getRoles =  Role::get();
        $getCategory=  Category::where('status' ,'Active')->get();
        $getwebsite_type =  WebsiteType::where('status' ,'Active')->get();
     

        return view('livewire.backend.news.create-news' ,['getwebsite_type' => $getwebsite_type, 'getCategory' =>$getCategory,    'records' =>$records]);
    }

    public function createNews(){
        $this->validate();
    }
    public function handleChange()
    {
        if ($this->news_type) {
            $this->gerUsers = User::where('website_type_id', $this->news_type)->get();
        } else {
            // Clear the user list if no news_type is selected
            $this->gerUsers = [];
        }
  
    }

}
