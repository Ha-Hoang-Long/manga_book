<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // \App\Models\User::factory(10)->create();
    }
}

class AdminTableSeeder extends Seeder {
 
    public function run()
    {
        // DB::table('users')->delete();
 
        DB::table('admins')->insert([
            'name' => 'Hoàng Long',
            'email' => 'admin',
            'password' => Hash::make('123123'),
        ]);
    }
 
}
