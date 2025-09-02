<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatWeProvide extends Model
{
    protected $table = 'what_we_do';

   
    protected $fillable = [
        'image',
        'title',
        'short_description',
        'icon_name',
        
    ];
}
