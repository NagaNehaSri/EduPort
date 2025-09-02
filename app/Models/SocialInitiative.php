<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialInitiative extends Model
{

    protected $table = 'social_initiatives';


    protected $fillable = [
        'tag',
        'heading',
        'description',
        'image',
        'heading_2',
        'description_2',
        'image_2',
        
    ];

}
