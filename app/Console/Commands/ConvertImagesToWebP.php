<?php

namespace App\Console\Commands;

use App\Models\NewsPost;
use App\Traits\UploadTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
class ConvertImagesToWebP extends Command
{
    use UploadTrait;
    
    protected $signature = 'images:upload';

    protected $description = 'Convert images upload';
    public function handle()
    {
        //
        // updateFileExtensions()
        try {
            $sourceImagesPath = public_path('assets/dummy');
            $files = File::files($sourceImagesPath);

            foreach ($files as $file) {
                // D:\php-laravel\htdocs\boldapunjab\public\assets\dummy
                // Construct the absolute file path
                // $imagePath = public_path('assets/dummy' . $file);
                // Check if the file already has a .webp extension
                if (pathinfo($file, PATHINFO_EXTENSION) === 'webp') {
                    Log::info('Skipping file with .webp extension: ' . $file);
                    continue; // Skip this file
                }

                // Check if the file is an image (you may need to add additional checks if needed)
                if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
                    // Generate the output path for the converted image
                    $outputDirectory = 'public/news_gallery'; // Adjust the output directory as needed
                    $outputPath = $outputDirectory . '/' . pathinfo($file, PATHINFO_FILENAME) . '.webp';
                    // Convert the image to WebP format
                    $convertedImagePath =  $this->convertToWebP($file, $outputPath);
                    // $filename[] = pathinfo($convertedImagePath, PATHINFO_BASENAME);
                    // $this->updateNewsPosts($filename);
            
                }
            }
            $this->info('Images Converted Successfully');
        } catch (\Exception $e) {
            // Log or handle the exception
            $this->error('Error: ' . $e->getMessage());
        }
    }

    // private function updateNewsPosts($filenames)
    // {
    //     // Fetch existing records with null image or thumbnail, ordered by ID
    //     $newsPosts = NewsPost::orderBy('id')->get();
    
    //     // Initialize an index for iterating over the filenames array
    //     $index = 0;
    
    //     foreach ($newsPosts as $post) {
    //         // Get the filename from the array based on the current index
    //         $filename = $filenames[$index] ?? null;
    
    //         if ($filename) {
    //             // Update the image and thumbnail paths
    //             $post->image = $filename;
    //             $post->thumbnail = $filename;
    
    //             // Save the changes to the database
    //             $post->save();
    
    //             // Increment the index for the next iteration
    //             $index++;
    //         } else {
    //             // If there are no more filenames in the array, break out of the loop
    //             break;
    //         }
    //     }
    // }
    
    
}
