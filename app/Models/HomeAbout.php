<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeAbout extends Model
{
    //
    protected $table = "home_about";

    protected $fillable = [
        
        "description",
        "image1",
        "image2",
        "heading",
        "short_description",
        "count",
        "count_heading",
        
        
    ];
}
