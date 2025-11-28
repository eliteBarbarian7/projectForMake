<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    public function index(): JsonResponse
    {
        $users = User::select('id', 'name', 'email')->get(); //получаем пользователей с выбранными полями
        return response()->json($users); //возвращаем пользователей в формате json
    }

    
}
