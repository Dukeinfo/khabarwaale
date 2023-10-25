<?php

namespace App\Livewire\Frontend\Innerpage;

use App\Models\Category;
use App\Models\NewsPost;
use Livewire\Component;

class ViewInnerPage extends Component
{

// Declare a public property to store the $id parameter

public $news_id ,$category_en, $category_hin ,$category_pbi  ,$category_urdu;
public $language_Val , $menuId ,$slug;

public function mount(NewsPost $newsid)
{

    if ($newsid) {
        $this->news_id = $newsid->id;
        $this->menuId =  $newsid->getmenu->id;

       

      
    } else {
        abort(404);

    }
}

    public function render()
    {

        $getNewsDetail = NewsPost::with('getmenu', 'newstype')->where('id' ,  $this->news_id  )
        ->where('status', 'Approved') ->whereNull('deleted_at')->first();    

        $currentUrl    = url()->current();

        $shareComponent = \Share::page(
            $currentUrl,
            $getNewsDetail->title,
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
    //     ->whatsapp()      # Generates a WhatsApp share button
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
        
        return view('livewire.frontend.innerpage.view-inner-page' ,
        [ 
             'shareComponent' =>$shareComponent , 
        
        'getNewsDetail' => $getNewsDetail
         ])->layout('layouts.app');
    }
}
