<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroupRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'group_id',
        'status_id'
    ];

    public function group() { // получение группы, в которую подана данная заявка
        return $this->belongsTo(UserGroup::class, "group_id");
    }

    public function user() { // получение пользователя, который подал данную заявку
        return $this->belongsTo(User::class, "user_id");
    }

    public function toArray() // преобразование в массив
    {
        $arr = parent::toArray();
        $arr['group'] = $this->group;
        return $arr;
    }
}
