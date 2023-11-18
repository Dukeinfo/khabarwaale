<?php

namespace App\Jobs;

use App\Mail\UserRegistrationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class userCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $createuser;
    protected $role;
    protected $assignments;

    /**
     * Create a new job instance.
     */
    public function __construct($createuser, $role, $assignments)
    {
        $this->createuser = $createuser;
        $this->role = $role;
        $this->assignments = $assignments;
     
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        try {
            Log::info('Roles:', $this->createuser->getRoleNames()->toArray());
            Log::info('All Permissions:', $this->createuser->getAllPermissions()->pluck('name')->toArray());
            Log::info('Direct Permissions:', $this->createuser->getDirectPermissions()->pluck('name')->toArray());
            Log::info('Menu Assignments:', $this->assignments);

            // Dispatch the email job
            $permissions = $this->createuser->getAllPermissions()->pluck('name')->toArray();
            Mail::to($this->createuser['email'])
                ->send(new UserRegistrationMail(
                    $this->createuser['email'],
                    $this->createuser['name'],
                    $this->createuser['user_password'],
                    $this->createuser['mobile'],
                    $this->createuser['address'],
                    $this->createuser['website_type_id'],
                    $this->role->name,
                    $permissions,
                    $this->assignments
                ));

        } catch (\Exception $e) {
            // Log the exception or perform any necessary actions
            // For example, you can log the error using Laravel's built-in logging system
            Log::error('Error sending user registration email: ' . $e->getMessage());
              // Re-throw the exception (optional, depends on your use case)
              throw $e;
        }
    }
}
