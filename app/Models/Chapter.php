<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $table = 'chapters';
    protected $guarded = []; // Allows mass assignment for all fields


    public function category()
    {
        return $this->belongsTo(Category::class, 'chapter_category', 'id');
    }
    public function contents()
    {
        return $this->hasMany(ChapterContent::class, 'chapter_id', 'id');
    }
    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'chapter_id', 'id');
    }
    public function activePayment()
    {
        return $this->hasOne(ChapterPayments::class)->where('uid',Session('uid'))
            ->where('status', 'active')
            ->whereDate('end_date', '>=', now()->toDateString());
    }
}
