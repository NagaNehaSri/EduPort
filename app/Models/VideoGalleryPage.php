<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGalleryPage extends Model
{
    use HasFactory;
    protected $table = "video_gallery_page";

    protected $fillable = [
        'tag',
        'heading',
        'description',
        'image',       
    ];
}
