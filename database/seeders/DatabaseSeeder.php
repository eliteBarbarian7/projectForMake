<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::factory(10)->create(); //Создаём 10 пользователей

        Post::factory(20)->create(); //Создаём 20 постов
    }
}
