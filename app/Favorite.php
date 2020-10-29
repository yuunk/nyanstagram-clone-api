<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $fillable = [
        'post_id',
        'user_id'
    ];

    public $timestamps = false;

}
