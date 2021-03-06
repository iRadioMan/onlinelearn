<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'main_file',
    ];

    public function questions(){ // получение списка вопросов для урока
        return $this->hasMany(Question::class, 'lesson_id');
    }

    public function getQuizResultAttribute(){ // получение списка результатов для текущего пользователя
        return QuizResult::where(['user_id' => Auth::user()->id, 'lesson_id' => $this->id])->orderByDesc('created_at')->first();
    }

    public function getAccessibleAttribute(){ // выяснение, доступен ли пользователю следующий урок
        $previous = Lesson::find(Lesson::where('id', '<', $this->id)->max('id'));
        if($previous && $previous->quizResult){
            return $previous->quizResult->correct_percentage >= (int)AppSettings::where('name', 'acceptable_percentage')->first()->value;
        }
        if($previous && !$previous->quizResult){
            return false;
        }
        return true;
    }
    
    public function toArray() // преобразование в массив
    {
        $arr = parent::toArray();
        $arr['questions'] = $this->questions;
        return $arr;
    }
}
