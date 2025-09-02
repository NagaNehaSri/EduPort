<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizSummary extends Model
{
    use HasFactory;

    protected $table="quiz_summary";

    protected $guarded=[];
    
    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id', 'id');
    }


}
