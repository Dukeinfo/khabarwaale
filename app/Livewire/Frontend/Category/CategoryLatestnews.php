<?php

namespace App\Livewire\Frontend\Category;

use App\Models\Advertisment;
use App\Models\NewsPost;
use Livewire\Component;

class CategoryLatestnews extends Component
{
 public $category;
public $languageVal;

    public function mount($categoryId){
      $this->category =  $categoryId;
      $this->languageVal = session()->get('language');

  
    }
    public function render()
    {
        $catWiselatest_eng_News = NewsPost::with(['newstype', 'user', 'getmenu'])
        ->where(function ($query) {
            $query->whereHas('getmenu', function ($subquery) {
                $subquery->where('id', 'like', '%' . $this->category . '%');
                    // ->orwhereIn('breaking_side', ['Show']);
            });
        })
        ->orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc')
        ->orderByRaw('RAND()');
    
    switch ($this->languageVal) {
        case 'hindi':
            $catWiselatest_eng_News->where('news_type', 1);
            break;
    
        case 'english':
            $catWiselatest_eng_News->where('news_type', 2);
            break;
    
        case 'punjabi':
            $catWiselatest_eng_News->where('news_type', 3);
            break;
    
        case 'urdu':
            $catWiselatest_eng_News->where('news_type', 4);
            break;
    
        default:
          $catWiselatest_eng_News->where('news_type', 1);
            // Handle the default case if needed
    }
    
    $catWiselatest_eng_News = $catWiselatest_eng_News->limit(6)->get();

    $today = now()->toDateString();
    $categorylatestleftAds = Advertisment::where('from_date', '<=', $today)
                       ->where('to_date', '>=', $today)
                       ->where('location','Left Add')
                       ->where('page_name' ,'category')
                       ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                       ->orderBy('created_at', 'desc')
                       ->first();
        return view('livewire.frontend.category.category-latestnews' , [
         'categorylatestleftAds' => $categorylatestleftAds,
         'catWiselatest_eng_News' =>$catWiselatest_eng_News]);
    }
}
