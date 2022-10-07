<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
//    use SoftDeletes;

    protected $table = "posts"; //явно указываем принадлежность к таблице
    protected $guarded = false; //устанавливаем для возможности добавлять данные в БД
}
