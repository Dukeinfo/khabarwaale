<?php

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Models\WebsiteType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

function authUserId(){
    return Auth::id();
 }
 function getMenuName($id){
    $menuName = Category::where('id', $id)->first();
    return $menuName->category_en;
}

function get_websiteType($id){
    $web_type = WebsiteType::where('id', $id)->first();
    return $web_type->name;
}

function getRoleName($id){
    $role = Role::where('id', $id)->first();
    return $role->name;
}

function getEditorId(){
    $editorId = User::where('role_id', 2)->first();
    return $editorId->id;
}


function createSlug($val)
{
    // Replace spaces, dots, and slashes with hyphens
    $slug = preg_replace('/[\s.\/]+/', '-', $val);
    
    // Convert to lowercase
    $slug = strtolower($slug);
    
    // Return the slug
    return $slug;
}

// function createSlug($val)
// {
//     // Extract the first 10 words
//     preg_match('/(?:\S+\s*){1,10}/', $val, $matches);
//     $first10Words = $matches[0];

//     // Replace spaces, dots, and slashes with hyphens
//     $slug = preg_replace('/[\s.\/]+/', '-', $first10Words);
    
//     // Convert to lowercase
//     $slug = strtolower($slug);
    
//     // Return the slug
//     return $slug;
// }





function md5createSlug($val)
{
    // $slug = preg_replace('/[\s.]+/', '-', $val);
    //for  space slash 
    $slug = preg_replace('/[\s.\/]+/', '-', $val);
    // Convert to lowercase
    $slug = strtolower($slug);

    // Create an MD5 hash
    $md5Hash = md5($slug);

    return $md5Hash;
}




function getUserIp()
{
    return !empty(request()->server('HTTP_CF_CONNECTING_IP')) ? request()->server('HTTP_CF_CONNECTING_IP') : request()->getClientIp();
}
// function getThumbnail($value) {
//     if (str_starts_with($value, 'https')) {
//         return $value;
//     }
//     return asset('uploads/thumbnail/'.$value);


    
// }



function getGallerydetail($image)
{
    if (str_starts_with($image, 'https')) {
        return $image;
    }

    return   asset('storage/uploads/gallery/'.$image);
}
  


function getAddImage($image)
{
 
    return   asset('storage/mainAdd/'.$image);
}
  
function get_pdf($pdf)
{
 
    return   asset('storage/pdf_files/'.$pdf);
}
  

// old helper for get news images

// function getNewsImage($image)
// {
//     $imagePath = 'public/news_gallery/' . $image;
//     if (Storage::exists($imagePath)) {
//         // Image exists, return its URL
//         return asset('storage/news_gallery/' . $image);
//     } 
//      else if (str_starts_with($image, 'https')) {
//         return $image;
//     }
//     else {
//         // Image does not exist, return URL of default image
//         return asset('thumb_652D6AC290510.jpg');
//     }


// }

function getNewsImage($image, $defaultImage = 'thumb_652D6AC290510.jpg')
{
    $imagePath = 'public/news_gallery/' . $image;

    if (Storage::exists($imagePath)) {
        // Image exists, return its URL
        return asset('storage/news_gallery/' . $image);
    } 
    else if (str_starts_with($image, 'https')) {
        // Image is a complete URL, return it
        return $image;
    }
    else {
        // Image does not exist, return URL of default image
        return asset($defaultImage);
    }
}

// old helper for getThumbnail
// function getThumbnail($value) {
//     if (str_starts_with($value, 'https')) {
//         return $value;
//     }
//     return asset('uploads/thumbnail/'.$value);
// }

function getThumbnail($value, $defaultImage = 'thumb_652D6AC290510.jpg') {
    // Check if the value is already a complete URL
    if (str_starts_with($value, 'https')) {
        return $value;
    }

    $thumbnailPath = public_path('uploads/thumbnail/' . $value);

    // Check if the image exists in the public directory
    if (file_exists($thumbnailPath)) {
        return asset('uploads/thumbnail/' . $value);
    } else {
        // Return the path to the default image
        return asset( $defaultImage);
    }
}





function get_video_image($image)
{
 
    return   asset('storage/video/'.$image);
}


function get_user_profile($profile)
{
 
    return   asset('storage/uploads/'.$profile);
}


// function get_user_profile($profile) {
//     $profilePath = 'storage/uploads/' . $profile;

//     // Check if the image exists in storage
//     if (Storage::exists($profilePath)) {
//         // Image exists, return its URL
//         return asset('storage/' . $profilePath);
//     } else {
//         // Image does not exist, return URL of default image
//         return asset( 'no_image.jpg');
//     }
// }



function get_add_Image($image)
{
 
    if (str_starts_with($image, 'https')) {
        return $image;
    }
    return   asset('storage/image/'.$image);
}


function translateAndSlug($text) {
    try {
        // Attempt translation
      
        $translatedText = GoogleTranslate::trans($text, 'en');
        
        // If translation succeeds, create slug
        return Str::of($translatedText)->slug('-');
    } catch (\Exception $e) {
        // Handle translation failure gracefully
        Log::error('Translation failed: ' . $e->getMessage());

        $slug = preg_replace('/[\s.\/]+/', '-', $text);
        // Convert to lowercase
        $slug = strtolower($slug);
        // Return the slug
        return $slug;

    }
}


if (! function_exists('abort_if_cannot')) {
    function abort_if_cannot(string $action, int $code = 403): void
    {
        $message = 'You do not have permissions to '.strtolower(str_replace('_', ' ', $action));
        abort_unless(auth()->user()->can($action), $code, $message);
    }
}

if (! function_exists('logActivity')) {
    function logActivity($subject, $performedOn, $properties = [], $event = null, $description = null)
    {
        activity($subject)
            ->causedBy(auth()->user())
            ->performedOn($performedOn)
            ->withProperties($properties)
            ->event($event)
            ->log($description);
    }
}

function get_pdfFile($pdf)
{
 
    return   asset('storage/pdf_docs/'.$pdf);
}
