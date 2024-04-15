<?php

namespace App\Console\Commands;

use App\Traits\UploadTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ConvertImagesToWebP extends Command
{
    use UploadTrait;
    
    protected $signature = 'images:convert';

    protected $description = 'Convert images to WebP format';
    public function handle()
    {
        //
        updateFileExtensions()
        // try {
        //     $directory = 'public/news_gallery'; // Adjust the directory path as needed

        //     // Get all files in the specified directory from the local disk
        //     $files = Storage::disk('local')->allFiles($directory);

        //     foreach ($files as $file) {
        //         // Construct the absolute file path
        //         $imagePath = storage_path('app/' . $file);

        //         // Check if the file already has a .webp extension
        //         if (pathinfo($file, PATHINFO_EXTENSION) === 'webp') {
        //             Log::info('Skipping file with .webp extension: ' . $file);
        //             continue; // Skip this file
        //         }

        //         // Check if the file is an image (you may need to add additional checks if needed)
        //         if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
        //             // Generate the output path for the converted image
        //             $outputDirectory = 'public/news_gallery'; // Adjust the output directory as needed
        //             $outputPath = $outputDirectory . '/' . pathinfo($file, PATHINFO_FILENAME) . '.webp';

        //             // Convert the image to WebP format
        //             $this->convertToWebP($imagePath, $outputPath);
        //         }
        //     }

        //     $this->info('Images Converted Successfully');
        // } catch (\Exception $e) {
        //     // Log or handle the exception
        //     $this->error('Error: ' . $e->getMessage());
        // }
    }
}
