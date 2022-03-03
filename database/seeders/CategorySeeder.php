<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'en_name' => 'News',
            'ar_name' => 'أخبار',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }
}
