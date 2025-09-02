<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccreditationImage extends Model
{
    use HasFactory;

    protected $table = 'accreditations_images';

 
  
    
    protected $fillable = [
        'accreditations_id',
        'image',
    
    ];

    
}
