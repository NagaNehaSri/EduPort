<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageCMS extends Model
{
    //
    protected $table = "images";

    protected $fillable = [
        "section_name",
        "image",
    ];
}
