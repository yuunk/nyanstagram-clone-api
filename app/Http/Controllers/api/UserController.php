<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;

use App\User;

class UserController extends Controller
{
    //
    public function signup(SignupRequest $request) {

        $value = $request->all();

        $user = new User();

        $user->fill($value)->save();

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
}
