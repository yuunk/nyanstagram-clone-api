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

    public function index($id = null)
    {

        $response = [];

        if ($id != null) {
            $response =
            Post::select(['users.name', 'posts.title', 'posts.updated_at', 'posts.id'])->join('users', 'users.id', '=', 'posts.user_id')->where('users.id', $id)->get();
        } else {
            $response =
            Post::select(['users.name', 'posts.title', 'posts.updated_at', 'posts.id'])->join('users', 'users.id', '=', 'posts.user_id')->get();
        }

        return $response;
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

        $authUser = Auth::user();

        $response = ['post' => $post, 'isMine' => false];

        if ($authUser) {

            $authUserPost = Post::where('user_id', $authUser->id)->where('id', $id)->get();

            if (!$authUserPost->isEmpty()) {
                $response = ['post' => $post, 'isMine' => true];
            }

        }

        return $response;
        // return response()->json($post);
    }

}
