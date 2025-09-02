<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $table = "working";

    protected $fillable = [
        "title",
        "description",
    ];
}
