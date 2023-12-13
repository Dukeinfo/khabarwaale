<?php

namespace App\Livewire\Frontend\Innerpage;

use App\Models\NewsPost;
use Livewire\Component;
use Livewire\WithPagination;

class InnerPageRecommended extends Component
{

    use WithPagination;
    public $getnews_id ,$category_en, $category_hin ,$category_pbi  ,$category_urdu;
    public $language_Val ,$getnews_category;
    
    public function mount( NewsPost $newsid){
        $this->language_Val = session()->get('language');
      if( $newsid ){
        $this->getnews_id = $newsid->id;
        $this->getnews_category = $newsid->category_id;
     

      }else{
            abort(404);
      }
        
      
    }
    public function render()
    {
                $recmendNewsData = NewsPost::with('getmenu', 'newstype')
                            ->where('status', 'Approved')
                            ->whereNull('deleted_at')
                            ->where(function ($query) {
                                    $query->whereIn('breaking_top', ['Show'])
                                    ->Where('category_id', $this->getnews_category);
                            })
                            // $query->whereIn('breaking_top', ['Show'])
                            // ->orWhere('id', $this->getnews_id)
                            // ->orWhere('category_id', $this->getnews_category);

                            ->orderBy('created_at', 'desc')
                            ->orderBy('updated_at', 'desc')
                            ->where('news_type', $this->getNewsType()) 
                            ->inRandomOrder() // Get random posts
                            ->limit(6)
                            ->get();
                                
                              

                                
        return view('livewire.frontend.innerpage.inner-page-recommended', ['recmendNewsData' => $recmendNewsData]);
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
