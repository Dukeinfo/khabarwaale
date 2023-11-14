<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
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
            // $thumbnailWidth = 100;
            // $thumbnailHeight = ($image->height() * $thumbnailWidth) / $image->width();
            // Resize the image to the thumbnail size
            // $image->resize($thumbnailWidth, $thumbnailHeight);

            // Generate a thumbnail and save it to the specified directory
            $thumbnailName = 'thumb_'.$file_name;
            Image::make($uploadedFile)->fit(100, 75)->save($directory.'/'.$thumbnailName);
            $image->save($directory.'/'. $thumbnailName);
            return ['file_name' => $file_name, 'thumbnail_name' => $thumbnailName];

          
         
    }

    public function unlinkBlogImage($model, $imageField = 'image', $thumbnailField = 'thumbnail')
    {
        $imagePath = Storage::path('public/blogimages/' . $model->$imageField);

        if (File::exists($imagePath) && isset($model->$imageField)) {
            unlink($imagePath);
            Log::info('Blog main  Image remved ');

        }

        if ($model->$thumbnailField) {
            $thumbnailPath = public_path('uploads/thumbnail/' . $model->$thumbnailField);
            if (file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }
            Log::info('Blog thumbnail  Image Removed ');
        }
    }



    // public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public'){
    //     // Generate a unique name for the image
    //     $filetype   =  $uploadedFile->getMimeType();
    //     $file_name  =  strtoupper(uniqid()) .'.'.$uploadedFile->getClientOriginalExtension();
    //     $filepath   =  $uploadedFile->storeAs($folder,$file_name, $disk);
    //     $filePathOnly = $folder;

    //     // Get the path where you want to save the image and thumbnail
    //     $directory = public_path('uploads/thumbnail');

    //     // Check if the directory exists, if not, create it
    //     if (!File::exists($directory)) {
    //         File::makeDirectory($directory, 0755, true, true);
    //     }
    //     // Generate a thumbnail and save it to the specified directory
    //     $thumbnailName = 'thumb_' . $file_name;
    //     Image::make($uploadedFile)->fit(100, 100)->save($directory.'/'.$thumbnailName);

    //     return [
    //         'file_name' => $file_name,
    //         'thumbnail_name' => $thumbnailName,
    //         'filepath' => $filePathOnly, // This will contain the path relative to the storage disk
    //         'filetype' => $filetype,
    //     ];
    // }

}
