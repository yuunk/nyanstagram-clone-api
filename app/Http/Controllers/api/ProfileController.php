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
}
