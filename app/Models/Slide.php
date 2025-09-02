<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    //
    protected $table = "slides";

    protected $fillable = [
        "property_id",
        "image",
    ];
}
