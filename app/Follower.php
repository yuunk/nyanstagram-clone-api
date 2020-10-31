<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $table = 'followers';
    //
    protected $fillable = [
        'followed_id',
        'follower_id'
    ];

    public $timestamps = false;

    public static function updateFollower($userId, $postId)
    {

    }

    public function isAlready($loginUserId, $profileUserId) {
        $follower =  $this->where('followed_id', $profileUserId)
                ->where('follower_id', $loginUserId)
                ->get();

        if ($follower->isEmpty()) {
            return false;
        } else {
            return true;
        }
    }

    public function register($loginUserId, $profileUserId)
    {
        $value = [
            'follower_id' => $loginUserId,
            'followed_id' => $profileUserId
        ];
        $follower = new Follower();
        $follower->fill($value)->save();
    }

}
