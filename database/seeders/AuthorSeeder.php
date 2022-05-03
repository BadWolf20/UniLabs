<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'IdAuthor' => 5,
            'Name' => 'Лев2',
            'Surname' => 'Толстой2',
            'Description' => '123123',
        ]);
    }
}
