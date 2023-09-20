<?php

namespace App\Livewire\Backend\News;

use App\Models\NewsPost;
use Livewire\Attributes\Url;
use Livewire\Component;

class CreateNews extends Component
{
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
        return view('livewire.backend.news.create-news' ,['records' =>$records]);
    }
}
