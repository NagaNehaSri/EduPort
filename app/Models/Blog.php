<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blogs";

    protected $fillable = [
        // "tag",
        "title",
        "date",
        "description",
        "thumbnail_image",
        "header_image",
        "view_image",
        "view_image_2",
        "bottom_description",
        "category",
        "status",
        "slug",
        "blog_page_short_description",
    ];
}
