<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    public function categories()
    {
        return $this->belongsToMany(Category::class,'menu_has_categories', 'menu_id', 'category_id');
    }

}
