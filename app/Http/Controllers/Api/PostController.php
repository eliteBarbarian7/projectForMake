<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{

    //возвращаем список постов на одну страницу по 15 штук
    public function index(Request $request): JsonResponse
    {
        $order = $request->get('order', 'newer');
    
        $posts = Post::with('user:id,name')
                ->select('id', 'title', 'excerpt', 'user_id', 'created_at')
                ->when($order == 'oldest', function($query) {
                    return $query->orderBy('created_at', 'asc'); //Сортировка от старых к новым
                }, function($query) {
                    return $query->orderBy('created_at', 'desc'); //Сортировка от новых к старым
                })
                ->paginate(15);
        
        return response()->json($posts);
    }

    //возвращаем определённый пост по его id
    public function show($id): JsonResponse
    {
        $post = Post::with('user:id,name,email')->findOrFail($id);
        return response()->json($post);
    }

    //создаём новый пост после прохождения валидации в StorePostRequest
    public function store(StorePostRequest $request): JsonResponse
    {
        $post = Post::create($request->validated());
        return response()->json($post, 201);
    }
}
