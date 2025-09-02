<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = "systemlogs";
    protected $fillable = [
        'user',
        'ipaddress',
        'login_time',
    ];
}

//COMMENT This is the new model need to store login logs