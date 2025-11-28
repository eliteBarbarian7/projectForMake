<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6), //Заголовок из 6 слов
            'excerpt' => $this->faker->paragraph(1), //Описание из одного абзаца
            'content' => $this->faker->text(500), //Текст из 500 символов
            'user_id' => User::factory(), //Создает пользователя автоматически
        ];
    }
}
