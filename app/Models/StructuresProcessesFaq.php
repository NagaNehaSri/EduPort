<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructuresProcessesFaq extends Model
{
 

    protected $table = 'structures_processes_faq';

   

    protected $fillable = [
        'title',
        'short_description',
        'image',
     
    ];

    
}
