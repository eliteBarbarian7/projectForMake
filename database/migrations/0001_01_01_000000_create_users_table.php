<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Создает таблицу users для хранения данных пользователей
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // уникальный идентификатор пользователя
            $table->string('name'); // имя пользователя
            $table->string('email')->unique(); // почта пользователя
            $table->string('password'); // пароль пользователя
            $table->timestamps(); // время создания записи и время изменения записи
        });
    }

    //Удаляет таблицу users при откате миграции
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
