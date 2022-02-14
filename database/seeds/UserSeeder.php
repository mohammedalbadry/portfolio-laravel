<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "momo",
            'email' => 'momo@gmail.com',
            'password' => Hash::make('123123123'),
        ]);
    }
}
