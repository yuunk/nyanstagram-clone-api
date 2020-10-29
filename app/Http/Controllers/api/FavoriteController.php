<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FavoriteRequest;
use Illuminate\Support\Facades\Auth;
use App\Favorite;

class FavoriteController extends Controller
{
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
