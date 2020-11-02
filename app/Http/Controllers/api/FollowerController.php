<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Follower;

class FollowerController extends Controller
{
    public function fetch(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $profileUserId = $request->profileUserId;

        $follower = new Follower();

        if ($follower->isAlready($loginUserId, $profileUserId)) {
            return ['follow' => true];
        } else {
            return ['follow' => false];
        }
    }
    //
    public function update(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $profileUserId = $request->profileUserId;

        if ($loginUserId) {

            // return $follower;
            $follower = new Follower();

            if ($follower->isAlready($loginUserId, $profileUserId)) {
                $follower->where('followed_id', $profileUserId)
                            ->where('follower_id', $loginUserId)
                            ->delete();
                return ['follow' => false];
            } else {
                $follower->register($loginUserId, $profileUserId);
                return ['follow' => true];
            }
        }

    }
}
