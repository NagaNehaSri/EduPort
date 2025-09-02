<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotAdmissions extends Model
{
    use HasFactory;

    protected $table = 'Spot_Admissions';
    protected $fillable = [
        'hero_heading', 
        'hero_description', 
        'hero_image', 
        'hero_heading_2', 
        'hero_description_2', 
        'hero_image_2', 
        'title', 
        'date', 
        'thumbnail_image', 
        'view_image', 
        'bottom_description', 
        'slug',
        'category_id',
        'short_description',
    ];

   
}

