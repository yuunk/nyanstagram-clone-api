<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
            'name' => 'taro',
            'email' => 'taro@yamada.jp',
            'password' => '12345678',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'amuro',
            'email' => 'amuro@yamada.jp',
            'password' => '12345678',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'shaa',
            'email' => 'shaa@yamada.jp',
            'password' => '12345678',
        ];
        DB::table('users')->insert($param);

    }
}
