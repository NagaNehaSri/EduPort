<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStorySpec extends Model
{
    protected $table = 'sucessstoriesspecifications';

    protected $fillable = [
      
        'title',
        'desgination',
        'short_description',
        'image',
        
    ];
}
