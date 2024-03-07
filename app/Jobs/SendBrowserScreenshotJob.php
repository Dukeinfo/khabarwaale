<?php

namespace App\Jobs;

use App\Mail\SendBrowserScreenshotMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Http;
// use Intervention\Image\Image;
use Image;
use Exception;
class SendBrowserScreenshotJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $email;
    protected $url;
    public function __construct($email, $url)
    {
        $this->email = $email;
        $this->url = $url;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        try {
            $todayDate = date('d-m-Y H:i:s');
            $fileName = 'screenshot_' . $todayDate . '_' . uniqid() . '_' . time() . '.jpg';
            // $fileName = 'screenshot_' . $todayDate . '_' . uniqid() . '_' . time() . '.pdf';
            $filePath = storage_path('app/' . $fileName);

            
        $captured =   Browsershot::url($this->url)
                    ->waitUntilNetworkIdle()
                    ->windowSize(1920, 1080) 
                    ->fullPage() // Capture the full page
                    // ->timeout(60000) 
                    ->save($filePath);
                    // ->savePdf($filePath);
                    if (file_exists($filePath)) {
                        $originalSize = filesize($filePath);
                        Mail::to($this->email)
                        ->send(new SendBrowserScreenshotMail($filePath, $fileName, $todayDate));


                        // Mail::raw('Webpage captured and saved successfully.', function ($message) use ($filePath, $fileName) {
                        //     $todayDate = date('Y-m-d');
                        //     $message->to($this->email)
                        //                 ->subject( $todayDate .' Webpage Screenshot')
                        //                 ->attach($filePath, [
                        //                     'as' => $fileName,
                        //                     'mime' => 'image/jpeg', // Adjust MIME type as per your requirement
                        //         ]);
                        //     });
                        Log::info('Webpage captured and sent successfully via email. Original image size:'  . $originalSize . ' bytes');
                    } else {
                        Log::error('File does not exist: ' . $filePath);
                    }
                    // Load the captured image using Intervention Image
                    $image = Image::make($filePath);
                    // // // Compress the image
                    $image->save($filePath, 50);
   

                    
        } catch (Exception $e) {
            // Handle any exceptions that occur
            Log::info('Error capturing or saving the webpage: ' . $e->getMessage());
        }
    }
}
