<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'title' => 'Iphone 11', 'parent' => null],
            ['id' => 2, 'title' => 'Sumsung X', 'parent' => null],
            ['id' => 3, 'title' => 'Nokia S3', 'parent' => null],
            ['id' => 4, 'title' => 'Iphone 15 Pro Max', 'parent' => null],
            ['id' => 5, 'title' => 'Noute box', 'parent' => null],
            ['id' => 6, 'title' => 'LG A34', 'parent' => 1],
            ['id' => 7, 'title' => 'Panassonic ss', 'parent' => 1],
            ['id' => 8, 'title' => 'Honor X5', 'parent' => 1],
            ['id' => 9, 'title' => 'Apple Iphone 12', 'parent' => 2],
            ['id' => 10, 'title' => 'Sumsung Galaxy', 'parent' => 2],
            ['id' => 11, 'title' => 'Vivo Y13', 'parent' => 3],
        ]);
    }
}