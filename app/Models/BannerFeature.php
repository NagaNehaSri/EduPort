<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerFeature extends Model
{
    use HasFactory;

    protected $table = 'banner_feature';
  
    protected $fillable = [
        'id',
        'bannerfeaturetext',
        
    ];
}

