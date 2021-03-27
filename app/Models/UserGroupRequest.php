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

    public function group(){
        return $this->belongsTo(UserGroup::class, "group_id");
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function toArray()
    {
        $arr = parent::toArray();
        $arr['group'] = $this->group;
        return $arr;
    }
}
