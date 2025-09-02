<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = "services";

    protected $fillable = [
        "heading_3",
        "service_name",
        "view_image", 
        "slug", 
        "service_page_short_description",
        "thumbnail_image",
        "icon_image",
        "heading_1",
        "description_1",   
        "heading_2",
        "description_2",  
        "view_image",
        "priority"     
    ];
}
