<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFeature extends Model
{
    //
    protected $table = "service_feature";

    protected $fillable = [
        "service_id",
        "title",
        "description", 
        "image", 
        "priority", 
        "status", 
    ];
}
