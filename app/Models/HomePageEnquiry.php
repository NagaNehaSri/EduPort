<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageEnquiry extends Model
{
    protected $table = "homepageenquiry";

    protected $fillable = [
       
        "heading",
        "video_text",
        "video_link",
        "short_description",
        
     
    ];
}
