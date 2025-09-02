<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipFAQ extends Model
{
    use HasFactory;
    protected $table = 'scholarship_faq';


    protected $fillable = [
        'tag',
        'heading',
        'description',
        'image',
     
       
        
    ];
}
