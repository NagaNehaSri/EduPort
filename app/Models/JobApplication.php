<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    //
    protected $table = "job_applications";

    protected $fillable = [
        "name",
        "mobile",
        "email",
        "resume",
    ];
}
