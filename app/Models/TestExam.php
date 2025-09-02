<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestExam extends Model
{
    use HasFactory;
    protected $table = 'test_exams';
    
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
