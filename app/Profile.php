<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'text',
        'user_id'
    ];

    public $timestamps = false;
}
