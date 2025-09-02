<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentService extends Model
{
  

    protected $table = 'student_services';
    
    protected $fillable = [
        'heading', 
        'description', 
        'description_2', 
        'description_3',
        'image',
        'image_2', 
        'slug',
       
    ];

    
}
