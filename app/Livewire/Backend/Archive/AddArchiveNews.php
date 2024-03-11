<?php

namespace App\Livewire\Backend\Archive;

use App\Models\ArchiveNews;
use App\Models\NewsPost;
use App\Traits\UploadTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;
use Livewire\Component;
use Carbon\Carbon;
class AddArchiveNews extends Component
{
    use UploadTrait;
    use LivewireAlert;
    #[Url(as: 'q')]
    public $search = '';
    protected $queryString = ['search'];
    public $archiveDate;
    public $newsPosts;
    public function render()
    {

   
        
        // $date = $request->input('date');
        // $endDate = Carbon::parse($date)->endOfDay();
    
        // Query to get archived news posts based on the provided date
        $records = ArchiveNews::whereNotNull('archived_at')
            // ->where('archived_at', '<=', $endDate)
            ->get();
            $trashdata = ArchiveNews::onlyTrashed()->get();
        return view('livewire.backend.archive.add-archive-news',['records' => $records , 'trashdata' =>$trashdata]);
    }

    public function Createarchive(){
        $this->validate([
            'archiveDate' => 'required|date|before_or_equal:today|unique:archive_news,archived_at',
        ]);
    
        // Validate the date format
        $parsedDate = Carbon::createFromFormat('Y-m-d', $this->archiveDate);
    
        // Check if the parsed date is a valid Carbon instance
        if (!$parsedDate instanceof Carbon) {
            $this->addError('archiveDate', 'Invalid date format. Use YYYY-MM-DD.');
            return;
        }
    
        $archive_News = new ArchiveNews(); 
        $archive_News->archived_at = $parsedDate;
        $archive_News->ip = getUserIp();
        $archive_News->status = 'Active';
        $archive_News->save();

        logActivity(
            'ArchiveNews',
            $archive_News,
            [
                'News id'    => $archive_News->id,
    
                'Archived at' => $archive_News->archived_at ,
            ],
            'Create',
            'ArchiveNews has been Created!'
        );
        $this->alert('success', 'Archive Created successfully!');

  
    }

    public function  inactive($id){
        $findcat = ArchiveNews::find($id);
        $findcat->status = "Inactive";
        $findcat->save();

        logActivity(
            'findcat',
            $findcat,
            [
                'News id'    => $findcat->id,
    
                'Archived at' => $findcat->archived_at ,
            ],
            'Inactive',
            'ArchiveNews has been inactive!'
        );
        $this->alert('info', 'Status Inactive successfully!');

    }
    public function  active($id){
            $findcat = ArchiveNews::find($id);
            $findcat->status = "Active";
            $findcat->save();

            logActivity(
                'findcat',
                $findcat,
                [
                    'News id'    => $findcat->id,
        
                    'Archived at' => $findcat->archived_at ,
                ],
                'Active',
                'ArchiveNews has been active!'
            );
            $this->alert('success', 'Status Active successfully!');
    }

    
    public function  delete($id){
        try {
            
            $findcat = ArchiveNews::findOrFail($id);

            logActivity(
                'findcat',
                $findcat,
                [
                    'News id'    => $findcat->id,
        
                    'Archived at' => $findcat->archived_at ,
                ],
                'Delete',
                'ArchiveNews has been deleted!'
            );

            $findcat->delete();
            $this->alert('warning', 'Archive Deleted successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());

        }

    }
    public function restore($id){
        try {
            
            $restore = ArchiveNews::withTrashed()->find($id);
            $restore->restore();
            $this->alert('success', 'Archive Restore successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());

        }
    }

public function paramDelete($id){
    try {

        ArchiveNews::onlyTrashed()->find($id)->forceDelete(); 
        $this->alert('success', 'Archive Deleted successfully!');
    } catch (\Exception $e) {
        dd($e->getMessage());

    }

}

// edit

public function edit($id){
    try {
        return redirect()->route('admin.edit_Archive_News',['archiveId' =>$id ]);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }

}
}
