<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterPayments extends Model
{
    use HasFactory;

    protected $table="chapter_payments";

    protected $guarded=[];
}
