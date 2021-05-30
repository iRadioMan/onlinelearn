<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'fullname',
        'login',
        'password',
        'group_id',
        'code',
    ];

    protected $hidden = [
        'password',
        'code',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function inGroup() { // имеет ли пользователь группу?
        return $this->group_id !== null;
    }
    
    public function group() { // получение группы пользователя
        return $this->belongsTo(UserGroup::class, 'group_id');
    }

    public function groupRequests() { // получение списка заявок пользователя в группы
        return $this->hasMany(UserGroupRequest::class, "user_id");
    }

    public function getLastGroupRequestAttribute() { // получение последней заявки пользователя в группу
        return UserGroupRequest::where('user_id', $this->id)->orderBy('created_at', 'desc')->first();
    }

    public function lastQuizResult($lesson_id) { // получение последнего результата теста пользователя
        return QuizResult::where(['user_id' => $this->id, 'lesson_id' => $lesson_id])->orderBy('created_at', 'desc')->first();
    }

    public function quizResults() { // получение списка результатов тестов пользователя
        return $this->hasMany(QuizResult::class, "user_id");
    }

    public function isAdmin() { // является ли пользователь администратором?
        return $this->is_admin == 1; 
    }
}
