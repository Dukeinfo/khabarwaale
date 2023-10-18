<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteType extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function users()
    {
        return $this->hasMany(User::class, 'website_type_id');
    }
    

    public function newsPosts()
    {
        return $this->hasMany(NewsPost::class, 'id' ,'news_type');
    }
}
