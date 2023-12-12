<?php

namespace App\Livewire\Frontend\Innerpage;

use App\Models\Category;
use App\Models\NewsPost;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR use only single facades 

use Artesaos\SEOTools\Facades\SEOTools;
class ViewInnerPage extends Component
{

    use LivewireAlert;

// Declare a public property to store the $id parameter

public $news_id ,$category_en, $category_hin ,$category_pbi  ,$category_urdu;
public $language_Val , $menuId ,$slug;

public function mount(NewsPost $newsid)
{

    // if ($newsid) {
    //     $this->news_id = $newsid->id;
    //     $this->menuId =  $newsid->getmenu->id;
      
    // } else {
    //     abort(404);

    // }

    if ($newsid) {
        if ($newsid->id) {
            $this->news_id = $newsid->id;
            if ($newsid->getmenu) {
                $this->menuId = $newsid->getmenu->id;
            } else {
                // Handle the case when 'getmenu' relation is null
                // You might want to handle this differently based on your application's logic
        abort(404);

            }
        } else {
            // Handle the case when 'id' property of $newsid is null
            // You might want to handle this differently based on your application's logic
        abort(404);

        }
    } else {
        // Handle the case when $newsid itself is null
        abort(404);
    }
}

    public function render()
    {
  try {
        $getNewsDetail = NewsPost::with('getmenu', 'newstype')->where('id' ,  $this->news_id  )
        ->where('status', 'Approved') ->whereNull('deleted_at')->firstOrFail();    
        $currentUrl    = url()->current();

        $shareComponent = \Share::page(
            $currentUrl,
            $getNewsDetail->title ,
      
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();
   

    //  $shareComponent =   \ShareButtons::page($currentUrl , $getNewsDetail->title, [
    //         'title' => $getNewsDetail->title,
    //         'rel' => 'nofollow noopener noreferrer',
    //     ])
    //     ->facebook()      # Generates a Facebook share button
    //     ->twitter()       # Generates a Twitter share button
    //     ->linkedin()      # Generates a LinkedIn share button
    //     ->telegram()      # Generates a Telegram share button
    //     ->whatsapp()     # Generates a WhatsApp share button
    //     ->reddit()        # Generates a Reddit share button
    //     ->hackernews()    # Generates a Hacker News share button
    //     ->vkontakte()     # Generates a VKontakte share button
    //     ->pinterest()     # Generates a Pinterest share button
    //     ->pocket()        # Generates a Pocket share button
    //     ->evernote()      # Generates an Evernote share button
    //     ->skype()         # Generates a Skype share button
    //     ->xing()          # Generates a Xing share button
    //     ->copylink()      # Generates a copy to the clipboard share button
    //     ->mailto() ;       # Generates a send by mail share button
    if($getNewsDetail){
        SEOTools::setTitle( 'ਖਬਰਾਂ ਵਾਲੇ -' .$getNewsDetail->title ?? 'khabarwaale');
        SEOTools::setDescription(strip_tags( Str::limit($getNewsDetail->news_description, 200))?? '');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addImage( getNewsImage($getNewsDetail->image) );
        SEOTools::twitter()->setSite($getNewsDetail->title ?? '');
        $keywords = $getNewsDetail->keywords ?? '';
        SEOMeta::addKeyword( $keywords);
        SEOTools::jsonLd()->addImage(getNewsImage($getNewsDetail->image));
        // OpenGraph
        OpenGraph::addImage( getNewsImage($getNewsDetail->image));
        $description =  strip_tags(Str::limit($getNewsDetail->news_description, 200));
        OpenGraph::setDescription($description);
        OpenGraph::setTitle($getNewsDetail->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);
        OpenGraph::addImage(asset('assets/images/logo.png'));  
        OpenGraph::addImage(getNewsImage($getNewsDetail->image));
        OpenGraph::addImage(['url' =>getNewsImage($getNewsDetail->image), 'size' => 250]);
        OpenGraph::addImage(getNewsImage($getNewsDetail->image), ['height' => 250, 'width' => 250]);
        // OpenGraph
    }
    } catch (\Exception $e) {
        // Handle other exceptions
        abort(403);
    //    dd( $e->getMessage());
    }
        return view('livewire.frontend.innerpage.view-inner-page' ,
        [ 
             'shareComponent' =>$shareComponent , 
        
        'getNewsDetail' => $getNewsDetail
         ])->layout('layouts.app');
    }
}
