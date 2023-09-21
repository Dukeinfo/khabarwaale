<?php

namespace App\Livewire\Backend\News;

use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Role;
use App\Models\WebsiteType;
use Livewire\Attributes\Url;
use Livewire\Component;

class CreateNews extends Component
{
    public $news_type;
    public $category_id;
    public $subcategory_id;
    public $user_id;
    public $role_id;
    public $reporter_id;
    public $old_parm;
    public $title;
    public $slug;
    public $heading;
    public $heading2;
    public $image;
    public $thumbnail;
    public $caption;
    public $pdf_file;
    public $news_description;
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
    public $status;
    public $Approved;
    public $reject_reason;
    public $post_date;
    public $post_month;

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
}
