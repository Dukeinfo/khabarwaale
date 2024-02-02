<?php

namespace App\Livewire\Backend\Videos;

use App\Models\VideoGallery;
use App\Traits\UploadTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditVideos extends Component
{

    use WithFileUploads;
    use UploadTrait;
    use LivewireAlert;
    public $video_image ;
    public $video_title_en ;
    public $video_title_hin ;
    public $video_title_pbi ;
    public $video_title_urdu ;
    public $slug ;
    public $thumbnail ;
    public $video_url ;
    public $post_date ;
    public $embed_code ;
    public $type ;
    public $sort_id ;
    public $status ;
    public $ip_address ;
    public $login ;
    public  $video_id ;
    public $editvideo_image;
    public function mount($vid_id){
         $getvideo=    VideoGallery::findOrFail($vid_id);
            $this->video_id = $getvideo->id ;
            $this->video_image = $getvideo->video_image ;
            $this->video_title_en = $getvideo->video_title_en ;
            $this->video_title_hin = $getvideo->video_title_hin ;
            $this->video_title_pbi = $getvideo->video_title_pbi ;
            $this->video_title_urdu = $getvideo->video_title_urdu ;
            $this->thumbnail = $getvideo->thumbnail ;
            $this->video_url = $getvideo->video_url ;
            $this->post_date = $getvideo->post_date ;
            $this->embed_code = $getvideo->embed_code ;
            $this->type = $getvideo->type ;
            $this->sort_id = $getvideo->sort_id ;
            $this->status = $getvideo->status ;
            $this->ip_address = $getvideo->ip_address ;
            $this->login = $getvideo->login ;
    }
    public function render()
    {
        return view('livewire.backend.videos.edit-videos');
    }

    public function updateVideo(){
        // if(!is_null($this->editvideo_image)){
        //     $image =  $this->editvideo_image;
        //     // Define folder path
        //     $folder = '/video';
        //     $vidimage = $this->uploadOne($image, $folder);

        //     $Videos = VideoGallery::find($this->video_id );
        //     // $Videos->video_image = $vidimage['file_name'];
        //     // $Videos->thumbnail = $vidimage['thumbnail_name'];
        //     $Videos->video_title_en = $this->video_title_en;
        //     $Videos->video_title_hin = $this->video_title_hin;
        //     $Videos->video_title_pbi = $this->video_title_pbi;
        //     $Videos->video_title_urdu = $this->video_title_urdu;
        //     $Videos->video_url = $this->video_url;
        //     $Videos->post_date = $this->post_date;
        //     $Videos->sort_id = $this->sort_id;
        //     $Videos->status = $this->status;
        //     $Videos->ip_address =getUserIp();
        //     $Videos->login = authUserId();
        //     $Videos->save();

        // }
        // else{
        $createVideos = VideoGallery::find($this->video_id );
        $createVideos->video_title_en = $this->video_title_en;
        // $createVideos->video_title_hin = $this->video_title_hin;
        // $createVideos->video_title_pbi = $this->video_title_pbi;
        // $createVideos->video_title_urdu = $this->video_title_urdu;
        $createVideos->video_url = $this->video_url;
        $createVideos->post_date = $this->post_date;
        // $createVideos->sort_id = $this->sort_id;
        $createVideos->status = 'Active';
        $createVideos->ip_address =getUserIp();
        $createVideos->login = authUserId();
        $createVideos->save();
        // }

        $this->alert('success', 'Video Created successfully!');
        return  redirect()->route('admin.create_videos');
    }
}
