<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'en_content' => 'New Post 1',
                'ar_content' => 'منشور جديد 1 ',
                'auther_id' => 1,
                'category_id' => 1,
                'created_at'=> now(),
                'updated_at'=> now()
            ],
            [
                'en_content' => 'New Post 2',
                'ar_content' => 'منشور جديد 2 ',
                'auther_id' => 2,
                'category_id' => 1,
                'created_at'=> now(),
                'updated_at'=> now()
            ]

        ]);
    }
}
