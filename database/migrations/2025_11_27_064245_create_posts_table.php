<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // уникальный иденттификатор поста
            $table->string('title', 100); // заголовок поста не более 100 символов
            $table->string('excerpt', 255); // краткое описание поста не более 100 символов
            $table->text('content'); // текст поста не ограниченный по количеству символов
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // id пользователя(constrained автоматически свяязывает с пользователем по первичному ключу)(при удалении пользователя автоматически удаляются его посты  onDelete'cascade')
            $table->timestamps(); //время создания записи и время изменения записи
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
