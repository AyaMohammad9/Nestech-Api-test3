<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'content'=>'nice post!',
                'auther_id'=>2,
                'post_id'=>1,
                'created_at'=> now(),
                'updated_at'=> now()
            ],
            [
                'content'=>'good post!',
                'auther_id'=>1,
                'post_id'=>2,
                'created_at'=> now(),
                'updated_at'=> now()
            ]
        ]);
    }
}
