<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
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
        //
        $exitCode = Artisan::call('cache:clear');
        $this->info('Application cache has been cleared');

        Artisan::call('queue:work');
    }
}
