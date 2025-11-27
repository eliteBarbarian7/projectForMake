<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'content', 'user_id'];

    public function user()
    {
        //Указывает что у постов может быть один пользователь(отношение многие к одному)
        return $this->belongsTo(User::class);
    }
}
