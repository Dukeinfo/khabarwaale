<?php

namespace App\Livewire\Backend\Archive;

use App\Models\ArchiveNews;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditArchiveNews extends Component
{
    use LivewireAlert;

    public $archiveDate;
    public $newsPosts;
    public $archiveId;
    public $arc_id;
    public function render()
    {
        return view('livewire.backend.archive.edit-archive-news');
    }
 public function mount($archiveId ){

    $archiveNews = ArchiveNews::findOrFail($archiveId);
    $this->arc_id = $archiveNews->id;
    $this->archiveDate = $archiveNews->archived_at;


 }

    
public function updateArchiveDate()
{
    // Find the archive record to update
    $archiveNews  =  ArchiveNews::find( $this->arc_id );

    #archiveNews
        $archiveNews->archived_at = $this->archiveDate;
        $archiveNews->save();

        logActivity(
            'findcat',
            $archiveNews,
            [
                'News id'    => $archiveNews->id,
    
                'Archived at' => $archiveNews->archived_at ,
            ],
            'Update',
            'ArchiveNews has been Updated!'
        );
        return redirect()->route('admin.Add_Archive_News')->with($this->alert('info', 'Status Inactive successfully!'));
       // Reset the input field
    
}
}
