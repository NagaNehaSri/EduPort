<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
    protected $table = "portfolio";

    protected $fillable = [
        "title",
        "date",
        "description",
        "thumbnail_image",
        "header_image",
        "view_image",
        "status",
        "slug",
    ];
}
