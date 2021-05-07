<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpPage extends Model
{
    use HasFactory;

    protected $table = "helppages";

    protected $fillable = [
        'name',
        'main_file',
    ];
}
