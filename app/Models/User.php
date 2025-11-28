<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    
    use HasFactory, Notifiable;

    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    //Скрытые поля, не показываются в json ответах
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', //Автоматически хеширует пароль
        ];
    }
    
    //Указывает что у пользователя может быть много постов(отношение один ко многим)
    public function posts()
    {
        return $this -> hasMany(Post::class);
    }
}
