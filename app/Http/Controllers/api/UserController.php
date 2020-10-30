<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
// use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Profile;

class UserController extends Controller
{
    //
    public function signup(SignupRequest $request) {

        $value = $request->all();

        $user = new User();

        $value = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ];
        $user->fill($value)->save();

        $profile = new Profile();
        $value = [
            'user_id' => $user->id,
            'text' => '',
        ];
        $profile->fill($value)->save();

        return 'sucess';
    }

    public function login(LoginRequest $request) {

        $response = User::checkUser($request);

        return $response;
    }

    public function check(Request $request) {

        if (User::checkToken($request)) {
            return 'true';
        } else {
            return 'false';
        }

    }

    public function logout(Request $request) {

        $user = User::where('email', $request->email)->first();

        $user->api_token = '';
        $user->save();

    }
}
