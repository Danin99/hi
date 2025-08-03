<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_has_categories', 'category_id', 'menu_id');
    }
}
