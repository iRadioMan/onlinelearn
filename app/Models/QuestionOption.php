<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    use HasFactory;

    public function toArray()
    {
        $arr = parent::toArray();
        $arr['correct'] = $this->correct ? true : false;
        return $arr;
    }
}
