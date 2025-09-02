<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResults extends Model
{
    use HasFactory;
    protected $table="quiz_results";
    protected $guarded=[];

}
