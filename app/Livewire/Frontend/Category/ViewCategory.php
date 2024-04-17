<?php

namespace App\Livewire\Frontend\Category;

use App\Models\Advertisment;
use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;
use Livewire\WithPagination;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOTools;

class ViewCategory extends Component
{

    use WithPagination;
public $categoryId ,$category_en, $category_hin ,$category_pbi  ,$category_urdu;
public $language_Val;

public function mount( $id){
  
    $this->language_Val = session()->get('language');
    $getCategory  =  Category::where('id' ,$id)->orderby('sort_id','ASC')->where('status' ,'Active')->where('deleted_at',Null)->first();
  if( $getCategory ){
    $this->categoryId = $getCategory->id;
    $this->category_en =  $getCategory->category_en;
    $this->category_hin =  $getCategory->category_hin;
    $this->category_pbi =  $getCategory->category_pbi;
    $this->category_urdu =  $getCategory->category_urdu;

    if($getCategory){
        SEOTools::setTitle( 'ਖਬਰਾਂ ਵਾਲੇ -' .$getCategory->category_pbi ?? 'khabarwaale');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite($getCategory->category_pbi ?? '');
    
      }
    
  }else{
        abort(404);
  }
    
  
}

    public function render()
    {
        $categoryIds = explode(',', $this->categoryId);
                    $catWiseNewsData = NewsPost::with(['newstype', 'user', 'getmenu'])
                    ->where(function ($query) use ($categoryIds) {
                        // Check if category_id contains any of the provided IDs
                        $query->where(function ($subquery) use ($categoryIds) {
                            foreach ($categoryIds as $categoryId) {
                                $subquery->orWhere('category_id', 'like', "%$categoryId%");
                            }
                        });
                    })
                    ->orderBy('created_at', 'desc')
                    ->orderBy('updated_at', 'desc')
                    ->where('news_type', $this->getNewsType()) 
                            ->orderByRaw('RAND()');
                       
                            $catWiseNewsData = $catWiseNewsData->paginate(9);
                     

                            $today = now()->toDateString();
                            $categorycenterpAdd = Advertisment::where('from_date', '<=', $today)
                                               ->where('to_date', '>=', $today)
                                               ->where('location','Center Banner')
                                               ->where('page_name' ,'category')
                                               ->where('status', 'Yes') // Assuming 'status' is used to enable/disable ads
                                               ->orderBy('created_at', 'desc')
                                              
                                               ->first();
                    


        return view('livewire.frontend.category.view-category',[
            'catWiseNewsData' =>$catWiseNewsData , 
            'categorycenterpAdd' => $categorycenterpAdd,
         
         
        ]);
    }

    private function getNewsType()
    {
                switch ($this->language_Val) {
                    case 'hindi':
                        return 1;

                    case 'english':
                        return 2;

                    case 'punjabi':
                        return 3;

                    case 'urdu':
                        return 4;

                    default:
                        return 1; // Handle the default case if needed
                }
    }
}
