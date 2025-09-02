<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResortGallery extends Model
{
    //
    protected $table = "resort_gallery";

    protected $fillable = [
        "image",
    ];
}
