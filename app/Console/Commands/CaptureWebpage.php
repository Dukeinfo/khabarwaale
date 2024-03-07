<?php

namespace App\Console\Commands;

use App\Jobs\SendBrowserScreenshotJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\Browsershot\Browsershot;
// use Intervention\Image\Image;
use Image;
use Exception;
class CaptureWebpage extends Command
{
    protected $signature = 'capture:webpage';

    protected $description = 'Capture a webpage and save it as an image.';


    public function handle()
    {
        //
        // try {
        //     $todayDate = date('Y-m-d');
        //     $fileName = 'screenshot_' . $todayDate . '_' . uniqid() . '_' . time() . '.jpg';
        //     // $fileName = 'screenshot_' . $todayDate . '_' . uniqid() . '_' . time() . '.pdf';
        //     $filePath = storage_path('app/' . $fileName);
        //     $captured =      Browsershot::url('https://www.khabarwaale.com')
        //             ->waitUntilNetworkIdle()
        //             ->windowSize(1920, 1080) 
        //             ->fullPage() // Capture the full page
        //             ->save($filePath);
        //             // ->savePdf($filePath);
        //             if (file_exists($filePath)) {
        //                 $originalSize = filesize($filePath);
        //                 Mail::raw('Webpage captured and saved successfully.', function ($message) use ($filePath, $fileName) {
        //                     $todayDate = date('Y-m-d');
        //                     $message->to('info@khabarwaale.com')
        //                                 ->subject( $todayDate .' Webpage Screenshot')
        //                                 ->attach($filePath, [
        //                                     'as' => $fileName,
        //                                     'mime' => 'image/jpeg', // Adjust MIME type as per your requirement
        //                         ]);
        //                     });
        //                 Log::info('Original image size: ' . $originalSize . ' bytes');
        //             } else {
        //                 Log::error('File does not exist: ' . $filePath);
        //             }
        //             // Load the captured image using Intervention Image
        //             $image = Image::make($filePath);
        //             // // // Compress the image
        //             $image->save($filePath, 50);
   
        //         $this->info('Webpage captured and saved successfully.');
        //         Log::info('Webpage captured and sent successfully via email.');
        // } catch (Exception $e) {
        //     // Handle any exceptions that occur
        //     Log::info('Error capturing or saving the webpage: ' . $e->getMessage());
        // }
        $email ='info@khabarwaale.com';
        $url = 'https://laravel.com';

        SendBrowserScreenshotJob::dispatch($email, $url);
        $this->info('Screenshot request queued for email.'. $email);

    }
}
