<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSliderImage extends Model
{
    protected $table = "blogslider";
    protected $fillable = [
        'blog_id',
        'blog_slider_image',
        
    ];
}
