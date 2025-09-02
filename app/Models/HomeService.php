<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class HomeService extends Model
{
    protected $table = "home_services";

    protected $fillable = [
       
        "title",
        "description",
        "image",
        "image2",
        "heading",
        "heading2",
        "short_description",
        "priority"
        
     
    ];
}
