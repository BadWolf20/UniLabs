<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_users')->insert([
            'IdUser' => 1,
            'Login' => '1',
            'Password' => '1',
            'Role' => '1',
            'Email' => '1',
            'Phone' =>'1',
        ]);
    }
}
