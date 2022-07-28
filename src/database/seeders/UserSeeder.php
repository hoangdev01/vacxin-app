<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



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
            'fullname' => 'Hoang Admin',
            'email' => 'admin@gmail.com',
            'address' => '',
            'phone' => '',
            'active' => true,
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'fullname' => 'Hoang User',
            'email' => 'hoanguser@gmail.com',
            'address' => '',
            'phone' => '',
            'active' => false,
            'password' => Hash::make('12345678'),
        ]);
    }
}
