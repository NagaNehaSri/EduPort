<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImagesSlider extends Model
{
    use HasFactory;

    protected $table = 'service_images_slider';

    protected $fillable = [
        'service_id',
        'images',
        
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
