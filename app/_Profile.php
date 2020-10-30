<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'text',
        'user_id'
    ];

    public $timestamps = false;

}
