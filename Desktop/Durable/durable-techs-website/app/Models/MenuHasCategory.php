<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuHasCategory extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'category_id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
