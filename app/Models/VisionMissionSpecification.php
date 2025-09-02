<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionMissionSpecification extends Model
{

    protected $table = 'VisionMissionSpecifications';

    protected $fillable = [
        'why_choose_us_id',
        'title',
        'short_description',
        'image',
        'created_at',
    ];
}
