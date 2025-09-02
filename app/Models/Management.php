<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    //
    protected $table = "managements";

    protected $fillable = [
        "name",
        "designation",
        "review",
        "profile_image",
    ];
}
