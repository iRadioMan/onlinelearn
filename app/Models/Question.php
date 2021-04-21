<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function question_options(){
        return $this->hasMany(QuestionOption::class, 'question_id');
    }

    public function getCorrectQuestionOptionsAttribute(){
        return $this->question_options->filter(function($value, $key){
            return $value->correct;
        });
    }

    public function toArray()
    {
        $arr = parent::toArray();
        $arr['question_options'] = $this->question_options;
        return $arr;
    }
}
