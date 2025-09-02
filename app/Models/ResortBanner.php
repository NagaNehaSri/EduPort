<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResortBanner extends Model
{
    //
    protected $table = "resort_banner";

    protected $fillable = [
       
        "heading",
       
        "image",
    ];
}
