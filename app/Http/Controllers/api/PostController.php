<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::all();

        $posts = Post::select(['users.name', 'posts.title', 'posts.updated_at', 'posts.id'])->join('users', 'users.id', '=', 'posts.user_id')->get();

        return $posts;
    }

    public function new(PostRequest $request) 
    {
        $authUser = Auth::user();
        if ($authUser) {

            $value = [
                'title' => $request->title,
                'text' => $request->text,
                'user_id' => $authUser->id
            ];

            $post = new Post;
            $post->fill($value)->save();
            return 'success';
        } else {
            return 'hoge';
        }
    }

    public function show($id)
    {
        $post = Post::select(['users.id', 'users.name', 'posts.title', 'posts.text', 'posts.updated_at'])->join('users', 'users.id', '=', 'posts.user_id')->find($id);

        return response()->json($post);
    }

}
