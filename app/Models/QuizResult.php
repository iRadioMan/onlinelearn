<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lesson_id',
        'correct_percentage',
    ];

    public function lesson(){
        return $this->belongsTo(Lesson::class, "lesson_id");
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
