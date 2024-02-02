<?php

namespace App\Livewire\Backend\Videos;

use App\Models\VideoGallery;
use App\Traits\UploadTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideos extends Component
{
    use WithFileUploads;
    use UploadTrait;
    use LivewireAlert;
    public $video_image , $type,$sort_id;
    public $video_title_hin ;
    public $video_title_pbi ;
    public $video_title_urdu ;
    #[Rule('required', message: 'Title field is required')] 
    public $video_title_en;
    #[Rule('required', message: 'Video id field is required')] 
    public $video_url;

    public $post_date;
    // #[Rule('required', message: 'Status field is required')] 
    public $status;
    #[Url(as: 'q')]
    public $search = '';
    protected $queryString = ['search'];
    public function render()
    {
        
        if (empty($this->post_date)) {
            $this->post_date = now()->format('Y-m-d'); // Set to current date
        }
        $search =  trim($this->search);
        $records = VideoGallery::where('video_title_en', 'like', '%'.$search.'%')
        ->orwhere('video_title_hin', 'like', '%'.$search.'%')
        ->orwhere('video_title_pbi', 'like', '%'.$search.'%')
        ->orwhere('video_title_urdu', 'like', '%'.$search.'%')
        ->orwhere('post_date', 'like', '%'.$search.'%')
        ->orwhere('video_url', 'like', '%'.$search.'%')
        ->orwhere('ip_address', 'like', '%'.$search.'%')
        ->latest()
        ->get();
        return view('livewire.backend.videos.create-videos',['records' =>$records]);
    }

    public function CreateVideo(){
        $this->validate();
        $createVideos = new VideoGallery();
        // if(!is_null($this->video_image)){
        //     $image =  $this->video_image;
        //     // Define folder path
        //     $folder = '/video';
        //     $vidimage = $this->uploadOne($image, $folder);
    
        //   } 
        // $createVideos->video_image = $vidimage['file_name'];
        // $createVideos->thumbnail = $vidimage['thumbnail_name'];
        $createVideos->video_title_en = $this->video_title_en;
        // $createVideos->video_title_hin = $this->video_title_hin;
        // $createVideos->video_title_pbi = $this->video_title_pbi;
        // $createVideos->video_title_urdu = $this->video_title_urdu;
        $createVideos->video_url = $this->video_url;
        $createVideos->post_date = $this->post_date;
        // $createVideos->sort_id = $this->sort_id;
        $createVideos->status = "Active";
        $createVideos->ip_address =getUserIp();
        $createVideos->login = authUserId();
        $createVideos->save();
        $this->reset();
        $this->alert('success', 'Video Created successfully!');

    }
    public function  inactive($id){
        $findvideo = VideoGallery::find($id);
        $findvideo->status = "Inactive";
        $findvideo->save();
        $this->alert('info', 'Video Inactive successfully!');

    }
    public function  active($id){
            $findvideo = VideoGallery::find($id);
            $findvideo->status = "Active";
            $findvideo->save();
            $this->alert('success', 'Video Active successfully!');
    }

    public function  delete($id){
        try {
            
            $delvideo = VideoGallery::findOrFail($id);
            $delvideo->delete();
            $this->alert('warning', 'Video Deleted successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());

        }

    }

    public function edit($id){
            try {
                return redirect()->route('admin.edit_videos',['vid_id' =>$id ]);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }

    }
}
