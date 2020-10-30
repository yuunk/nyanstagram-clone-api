<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Profile;
use App\User;

class ProfileController extends Controller
{
    //
    public function fetch() {
        $userId = Auth::user()->id;

        $profile = User::select(['users.name', 'profiles.text'])
                                ->join('profiles', 'profiles.user_id', '=', 'users.id')
                                ->where('users.id', $userId)
                                ->first();
        
        if ($profile == null) {
            return 'false';
        } else {
            return $profile;
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
}
