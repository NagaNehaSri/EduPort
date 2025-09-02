<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlatSlide extends Model
{
    //
    protected $table = "flat_slides";

    protected $fillable = [
        "flat_id",
        "image",
    ];
}
