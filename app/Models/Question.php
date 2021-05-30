<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'lesson_id'];

    public function question_options() { // получение вариантов ответов для текущего вопроса
        return $this->hasMany(QuestionOption::class, 'question_id');
    }

    public function getCorrectQuestionOptionsAttribute() { // получение правильных вариантов ответа для вопроса
        return $this->question_options->filter(function($value, $key){
            return $value->correct;
        });
    }

    public function toArray() // преобразование в массив
    {
        $arr = parent::toArray();
        $arr['question_options'] = $this->question_options;
        return $arr;
    }
}
