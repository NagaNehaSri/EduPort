<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutImage extends Model
{
    protected $table = "about_images";
    protected $fillable = [
        'about_id',
        'about_image',
        
    ];
}
