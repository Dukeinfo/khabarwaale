<?php

namespace App\Livewire\Frontend\Homepage;

use App\Models\NewsPost;
use Livewire\Attributes\Url;
use Livewire\Component;

class SearchComponent extends Component
{
    #[Url(as: 'q')]
    public $search = '';
    public $records;
    // protected $queryString = ['search'];
    public $languageVal;

    public function mount(){
            $this->languageVal = session()->get('language');
        }
        
    protected $queryString = ['search'];
    public function render()
    {
        $search =  trim($this->search);
        $posts = NewsPost::with(['newstype', 'user', 'getmenu'])
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                            ->orwhere('heading', 'like', '%' . $search . '%')
                        ->orWhereHas('newstype', function ($subquery) use ($search) {
                            $subquery->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('user', function ($subquery) use ($search) {
                            $subquery->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('getmenu', function ($subquery) use ($search) {
                            $subquery->where('category_en', 'like', '%' . $search . '%');
                        });
                })
                ->limit(10)
                ->get();
     
        return view('livewire.frontend.homepage.search-component' , [
            'posts' =>  $posts,
        ]);
    }
}
