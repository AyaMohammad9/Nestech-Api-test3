<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            [
                'name' => Str::random(10),
                'email' => 'user1@gmail.com',
                'password' => Hash::make('123'),
                'created_at'=> now(),
                'updated_at'=> now()
            ],
            [ 
                'name' => Str::random(10),
                'email' => 'user2@gmail.com',
                'password' => Hash::make('123'),
                'created_at'=> now(),
                'updated_at'=> now()
            ]
        ]);
    }
}
