<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'user_id' => 1,
            'title' => 'test投稿',
            'text' => 'texttexttexttexttext'
        ];
        $param2 = [
            'user_id' => 2,
            'title' => 'test投稿2',
            'text' => 'texttexttexttexttext'
        ];
        $param3 = [
            'user_id' => 2,
            'title' => 'test投稿',
            'text' => 'texttexttexttexttext'
        ];

        DB::table('tweets')->insert($param);
        DB::table('tweets')->insert($param2);
        DB::table('tweets')->insert($param3);
    }
}
