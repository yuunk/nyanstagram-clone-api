<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public static $rules = array(
        'name' => 'required',
        'email' => 'required',
        'password' => 'min:8|max:20'
    );

    public static function checkUser($request) {

        $user = User::where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if ($user) {

            $token = Str::random(80);

            $user->api_token = $token;

            return $token;

        } else {
            $res = response()->json([
                'errors' => [
                    'password' => 'passwordが違います'
                ],
            ], 400);
            throw new HttpResponseException($res);
        }

    }

    public static function checkPassword($password) {

    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
