<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    //
    public function index(PostRequest $request) 
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
}
