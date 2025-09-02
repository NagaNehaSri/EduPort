<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResortSection extends Model
{
    //
    protected $table = "resort_sections";

    protected $fillable = [
        "heading",
        "description",
        "image",
    ];
}
