<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class hogeController extends Controller
{
    //
    public function test() {
        $items = [
            'ok',
            'bad'
        ];
        return $items;
    }

    public function index() {
        $items = [
            'ok',
            'bad'
        ];
        return $items;
    }

}
