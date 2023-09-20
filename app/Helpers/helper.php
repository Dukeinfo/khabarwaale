<?php

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function authUserId(){
    return Auth::id();
 }
 function getMenuName($id){
    $menuName = Category::where('id', $id)->first();
    return $menuName->category_en;
}


function createSlug($val)
{
    $slug = preg_replace('/[\s.]+/', '-', $val);
    // Convert to lowercase
    $slug = strtolower($slug);
    return $slug;
}

function getThumbnail($value) {
    if (str_starts_with($value, 'http')) {
        return $value;
    }
    return asset('uploads/thumbnail/'.$value);
}


function getUserIp()
{
    return !empty(request()->server('HTTP_CF_CONNECTING_IP')) ? request()->server('HTTP_CF_CONNECTING_IP') : request()->getClientIp();
}


function getGallerydetail($image)
{
    if (str_starts_with($image, 'http')) {
        return $image;
    }

    return   asset('storage/uploads/gallery/'.$image);
}

