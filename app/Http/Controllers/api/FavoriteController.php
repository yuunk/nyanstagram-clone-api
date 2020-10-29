<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FavoriteRequest;
use Illuminate\Support\Facades\Auth;
use App\Favorite;
use App\Post;
use App\User;

class FavoriteController extends Controller
{

    public function index()
    {
        $userId = Auth::user()->id;

        $posts = Favorite::select(['posts.id', 'posts.title', 'posts.text','posts.updated_at', 'users.name'])
                    //  ->select(['users.name', 'posts.title'])
                        ->join('users', 'users.id', '=', 'favorites.user_id')
                        ->join('posts', 'posts.id', '=', 'favorites.post_id')
                        ->where('favorites.user_id', $userId)
                        ->get();

        return $posts;
    }

    //
    public function update($id)
    {

        $postId = $id;
        $authUser = Auth::user();

        $isFavorite = Favorite::where('post_id', $postId)
                                ->where('user_id', $authUser->id)->get();

        if ($isFavorite->isEmpty()) {

            $favorite = new Favorite();
            $value = [
                'user_id' => $authUser->id,
                'post_id' => $postId
            ];

            $favorite->fill($value)->save();

            return 'true';
        } else if ($isFavorite){

            Favorite::where('post_id', $postId)->where('user_id', $authUser->id)->delete();

            return 'false';
        } else {
            return 'false';
        }
    }

    public function fetch($id)
    {
        $postId = $id;
        $authUser = Auth::user();

        $isFavorite = Favorite::where('post_id', $postId)
            ->where('user_id', $authUser->id)->get();

        if ($isFavorite->isEmpty()) {

            return 'false';
        } else {
            return 'true';
        }
    }
}
