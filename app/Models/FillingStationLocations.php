<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FillingStationLocations extends Model
{


    protected $table = 'filling_stations';

    protected $fillable = [
        'tag',
        'heading',
        'priority',
        'description',
        'image',
        'heading_2',
        'description_2',
        'image_2',
        'heading_3',
        'description_3',
        
    ];
}
