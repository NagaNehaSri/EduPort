<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adblue extends Model
{
    use HasFactory;

    protected $table = 'adblue';

    protected $fillable = [
        'heading',
        'description',
        'description2',
        'image',
        'image2',
        'tags',
        'slug',
       
    ];
}
