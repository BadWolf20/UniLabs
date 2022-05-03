<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksRequests extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books_requests')->insert([
            'IdBook' => 1,
            'IdRequest' => 2,
            'Quantity' => '1',
        ]);
    }
}
