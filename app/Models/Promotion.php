<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    protected $table = "promotion";

    protected $fillable = [
        "title",
        "youtube_link",
        "image",
    ];
}
