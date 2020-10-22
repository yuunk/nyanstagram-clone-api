<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;

use App\User;

class UserController extends Controller
{
    //
    public function signup(SignupRequest $request) {

        $value = $request->all();

        // $this->validate($request, User::$rules);
        
        // User::findOrFail($request->email);
        
        $user = new User();

        $user->fill($value)->save();

        return 'sucess';
    }
}
