<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{


    //Определяет, авторизован ли пользователь для выполнения запроса, но системы атентицикации в программе нет поэтому стоит значение true(всем разрешено запрос делать)
    public function authorize(): bool
    {
        return true;
    }


    //Правила валидации для создания поста
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id', //обязательная поле с id пользователя
            'title' => 'required|string|max:100', //обязательное поле с заголовком макс длина 100
            'excerpt' => 'required|string|max:255',//обязательное поле краткое описание максс длина 255
            'content' => 'required|string' //обязательное поле с основным текстом неограниченное по количеству
        ];
    }
}
