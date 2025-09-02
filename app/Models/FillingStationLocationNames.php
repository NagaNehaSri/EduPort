<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FillingStationLocationNames extends Model
{


 
    protected $table = 'filling_station_location_names';

    protected $fillable = [
        'title',
        'short_description',
        'image',
        'filling_station_id',
        'priority'
       
    ];

}
