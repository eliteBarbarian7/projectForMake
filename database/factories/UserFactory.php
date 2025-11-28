<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
   
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(), //генерирует случайное имя
            'email' => $this->faker->unique()->safeEmail(), //уникальный email
            'password' => Hash::make('password'), //пароль
        ];
    }
}
