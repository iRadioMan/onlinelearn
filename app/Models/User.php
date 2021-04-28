<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'login',
        'password',
        'group_id',
        'code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'code',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function inGroup() {
        return $this->group_id !== null;
    }
    
    public function group() {
        return $this->belongsTo(UserGroup::class, 'group_id');
    }

    public function groupRequests() {
        return $this->hasMany(UserGroupRequest::class, "user_id");
    }

    public function getLastGroupRequestAttribute() {
        return UserGroupRequest::where('user_id', $this->id)->orderBy('created_at', 'desc')->first();
    }

    public function lastQuizResult($lesson_id) {
        return QuizResult::where(['user_id' => $this->id, 'lesson_id' => $lesson_id])->orderBy('created_at', 'desc')->first();
    }

    public function quizResults() {
        return $this->hasMany(QuizResult::class, "user_id");
    }

    public function isAdmin() {
        return $this->is_admin == 1; 
    }
}
