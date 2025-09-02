<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    use HasFactory;

    protected $table = 'vision_mission';

    protected $fillable = [
        'heading',
        'description',
        'image',
        'icon_name',
        'vision_heading',
        'vision_description',
        'vision_image',
        'mission_heading',
        'mission_description',
        'mission_image',
        'business_objective_heading',
        'business_objective_description_1',
        'business_objective_description_2',
        
    ];
}
