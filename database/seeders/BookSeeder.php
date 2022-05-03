<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'IdBook' => 1,
            'Name' => 'Война и мир',
            'Mark' => '1',
            'Description' => '1',
            'Access' => '1',
            'Price' => '1',
            'Quantity' => '1',
            'Year' => '2000',
            'Image' => '123',
            'IdPublisher' => '1',
            'IdGenre' => '1',
            'IdAuthor' => '1',
        ]);
    }
}
