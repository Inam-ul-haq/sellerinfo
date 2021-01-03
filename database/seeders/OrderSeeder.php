<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'amzid' => 18,
            'samid' => 78,
            'quantity' => 323,
            'samq' => 2313,
            'samp' => 123192,
            'pname' => 'MacBook',
            'same' => 'azib@ramay.com',
        ]);
    }
}
