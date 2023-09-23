<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsPost extends Model
{
    use HasFactory;
    protected $guarded = [];
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getmenu()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function newstype()
    {
        return $this->belongsTo(WebsiteType::class, 'news_type');
    }
}
