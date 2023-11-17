<?php

namespace App\Livewire\Backend\News;

use App\Models\NewsPost;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ViewReporterNews extends Component
{

    use WithFileUploads;
    use UploadTrait;
    use LivewireAlert;
    use WithPagination;
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

    public function render()
    {
        DB::enableQueryLog();
        $totalnews = NewsPost::where('user_id' , authUserId())->count();


        $search = trim($this->search);
        $reporterRecords = NewsPost::with(['newstype', 'user', 'getmenu'])
        ->where('user_id', authUserId()) // Ensure that the news post belongs to the authenticated user
        ->where(function ($query) use ($search) {
            $query->whereHas('newstype', function ($typequery) use ($search) {
                $typequery->where('name', '=', $search);
            })->orWhereHas('user', function ($userquery) use ($search) {
                $userquery->where('name', '=', $search);
            })->orWhereHas('getmenu', function ($catquery) use ($search) {
                $catquery->where('category_en', '=', $search)
                ->orwhere('category_en', 'like', '%'.$search.'%');
            })->orWhereDate('post_date', $search)
            ->orWhere('post_month', $search)
            ->orWhere('title', 'like', '%' . $search . '%')
            ->orWhere('status', 'like', '%' . $search . '%');
        })
        ->orderBy('category_id')
        ->latest()
        ->get();
    
        $reporterTrashdata = NewsPost::where('user_id' , authUserId())->onlyTrashed()->get();
        $this->queryTime = collect(DB::getQueryLog())->sum('time');

        // ->paginate(20);
        return view('livewire.backend.news.view-reporter-news' ,[
            'reporterRecords' =>$reporterRecords ,
            'reporterTrashdata' => $reporterTrashdata,
            'totalnews' =>$totalnews,

    ]);
    }


    // editReporter
    public function editReporterNews($id){
        try {
            return redirect()->route('admin.edit_reporter_news',['news_id' =>$id ]);
        } catch (\Exception $e) {
            $this->alert('error', 'News not found');
            dd($e->getMessage());
        }

    }


}
