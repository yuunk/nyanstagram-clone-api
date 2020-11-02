<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Follower;
use App\Post;
use App\Profile;
use App\User;

class ProfileController extends Controller
{
    //
    public function fetch($id = null) {
        $userId = '';

        if ($id) {
            $userId = $id;
        } else {
            $userId = Auth::user()->id;
        }

        $profile = User::select(['users.name', 'profiles.text'])
                                ->join('profiles', 'profiles.user_id', '=', 'users.id')
                                ->where('users.id', $userId)
                                ->first();
        
        if ($profile == null) {
            return 'false';
        } else {
            return ['profile' => $profile, 'userId' => $userId] ;
        }
    }

    public function update(Request $request) {
        $userId = Auth::user()->id;

        $currentProfile = Profile::where('user_id', $userId)->first();
        $profile = Profile::find($currentProfile->id);
        $profile->text = $request->text;
        $profile->save();

        $user = User::find($userId);
        $user->name = $request->name;
        $user->save();

        $response = User::select(['users.name', 'profiles.text'])
                            ->join('profiles', 'profiles.user_id', '=', 'users.id')
                            ->where('users.id', $userId)
                                ->first();

        if ($response == null) {
            return 'false';
        } else {
            return $response;
        }

    }

    public function record($id = null) {

        $loginUserId = Auth::user()->id;
        $userId = null;

        if ($id == null && $loginUserId) {
            $userId = $loginUserId;
        } else {
            $userId = $id;
        }

        $userPosts = Post::where('user_id', $userId)->count();
        $followerCount = Follower::where('follower_id', $userId)->count();
        $followCount = Follower::where('followed_id', $userId)->count();

        return ['userPosts' => $userPosts, 'follower' => $followerCount, 'follow' => $followCount];
    }
}
