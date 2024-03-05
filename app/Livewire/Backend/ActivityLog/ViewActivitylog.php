<?php

namespace App\Livewire\Backend\ActivityLog;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Gate;

#[Title(' View Activitylog  ')]
class ViewActivitylog extends Component
{

    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $logId = [];
    public function render()
    {
        $search = trim($this->search);
        $activityLogs = Activity::where(function ($query) use ($search) {
            $query->where('log_name', 'like', '%' . $search . '%')
                ->orwhere('description', 'like', '%' . $search . '%')
                ->orwhere('event', 'like', '%' . $search . '%');
        })
            ->latest()
            ->paginate(10);

        // $activityLogs = Activity::all();
        return view('livewire.backend.activity-log.view-activitylog',['activityLogs' =>$activityLogs]);
    }



    public function delete($id)
    {
        if (Gate::allows('admin')) {
            try {
                $deleteData =  Activity::find($id);
                $deleteData->delete();
                $this->alert('success', 'Activity Log deleted successfully');
            } catch (\Exception $e) {
                 $this->alert('error', 'Pctivity Log not found');

                // dd($e->getMessage());
            }
        } else {

            dd('You are not Admin');
        }
    }

    public function deleteAll()
    {
        if (count($this->logId) > 0) {
            Activity::whereIn('id', $this->logId)->delete();
            $this->alert('success', 'Activity Log Deleted');

            
        } else {
        
            $this->alert('error', 'Please Select First');

        }
    }

    public function checkAll()
    {
        $activityLogs =    Activity::get();
        if ($activityLogs) {
            $this->logId =     $activityLogs->pluck('id')->toArray();
        } else {
            $this->logId = [];
        }
    }
}
