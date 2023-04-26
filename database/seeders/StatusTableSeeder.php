<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statuss')->insert([
            ['id' => '1','name' => 'Chờ xử lý'],
            ['id' => '2','name' => 'đã duyệt'],
            ['id' => '3','name' => 'Không duyệt'],
        ]);
    }
}
