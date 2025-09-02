<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    //
    protected $table = "why_choose_us";

    protected $fillable = [
        "title",
        "description",
        "image",
        "image2",
        "heading",
        "short_description",
    ];
}
