<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    //
    protected $table = "resort_youtube_links";

    protected $fillable = [
        "youtube_link",
    ];

}
