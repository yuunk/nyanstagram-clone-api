<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HogeController extends Controller
{
    //

    public function index()
    {
        $items = [
            'ok',
            'bad'
        ];
        return $items;
    }
}
