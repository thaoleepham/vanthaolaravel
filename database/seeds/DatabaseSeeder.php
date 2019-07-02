<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'pham van hao',
            'email' => 'thaoleepham@gmail.com',
            'role' => 1,
            'password' => bcrypt('thao123'),
        ]);
    }
}
