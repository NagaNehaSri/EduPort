<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAboutImage extends Model
{
    protected $table = "home_about_images";
    protected $fillable = [
        'home_about_id',
        'home_about_image',
        
    ];
}
