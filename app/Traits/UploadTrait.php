<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;
trait UploadTrait
{
    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public')
    {
            // Generate a unique name for the image
            $file_name =  strtoupper(uniqid()) .'.'.$uploadedFile->getClientOriginalExtension();
                // Optimize the uploaded image
        
        try{
          $uploadedFile->storeAs($folder,$file_name, $disk);

        } catch (\Exception $e) {
            // Handle the exception (e.g., log it or display an error message)
            dd($e->getMessage());
        }
            // Get the path where you want to save the image and thumbnail
            $directory = public_path('uploads/thumbnail');
   
            // Check if the directory exists, if not, create it
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true, true);
            }
            $image = Image::make($uploadedFile);
               // Calculate the new height to maintain the aspect ratio
            $thumbnailWidth = 100;
            $thumbnailHeight = ($image->height() * $thumbnailWidth) / $image->width();

            // Resize the image to the thumbnail size
            $image->resize($thumbnailWidth, $thumbnailHeight);


            // Generate a thumbnail and save it to the specified directory
            $thumbnailName = 'thumb_'.$file_name;
            $image->save($directory.'/'. $thumbnailName);

            // Image::make($uploadedFile)->fit(100, 80)->save($directory.'/'.$thumbnailName);
            return ['file_name' => $file_name, 'thumbnail_name' => $thumbnailName];

          
         
    }
}