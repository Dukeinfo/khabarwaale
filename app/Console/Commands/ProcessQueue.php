<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Filesystem\Filesystem;
class ProcessQueue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process the Laravel queue';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $exitCode = Artisan::call('cache:clear');
        // $this->info('Application cache has been cleared');
        // Log::info('Queue worker is already running');
             
        $lockFile = storage_path('queue_process.lock');

        // Check if a lock file exists, indicating that a process is already running
        if (file_exists($lockFile)) {
            $this->info('Queue worker is already running.');
            // Log::info('Queue worker is already running');

            return;
        }

        // Create a lock file to indicate that a process is now running
        (new Filesystem)->put($lockFile, '');

        try {
            Log::info('Starting queue worker in the background...');
            Artisan::call('queue:work', ['--daemon' => true]);
            $this->info('Queue worker has been started.');
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error running queue worker: ' . $e->getMessage());
        } finally {
            // Remove the lock file after the process has finished (even if an exception occurred)
            Log::info('Before deleting lock file');
                (new Filesystem)->delete($lockFile);
            Log::info('After deleting lock file');
        }
    }
}
