<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requests')->insert([
            'IdRequest' => 2,
            'Date' => Carbon::parse('2020-01-01'),
            'Price' => '1',
            'Address' => '1',
            'IdUser' => '1',
        ]);
    }
}
