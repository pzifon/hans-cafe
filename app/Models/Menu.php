<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    // protected $table = 'menus';
    protected $fillable = [
        'menu_code',
        'name',
        'description',
        'category',
        'image',
        'price',
        'nutrition',
    ];
}