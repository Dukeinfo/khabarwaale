<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    use SoftDeletes;

    public function assigneMenus()
    {
        return $this->hasMany(AssigneMenu::class, 'category_id');
    }


    public function catwiseNews()
    {
        return $this->hasMany(NewsPost::class,'id', 'category_id');
    }
}
