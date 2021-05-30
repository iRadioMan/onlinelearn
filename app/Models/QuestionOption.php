<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    use HasFactory;
    
    protected $fillable = ['description', 'correct', 'question_id'];

    public function toArray() // преобразование в массив
    {
        $arr = parent::toArray();
        $arr['correct'] = $this->correct ? true : false;
        return $arr;
    }
}
