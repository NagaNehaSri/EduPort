<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accreditations extends Model
{
    use HasFactory;
    protected $table = 'accreditations';


    protected $fillable = [
        'tag',
        'heading',
        'description',
        'image',
     
        'description_2',
        'image_2',
        
    ];
}
