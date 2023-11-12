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
            ['id' => 1, 'title' => 'Iphone', 'parent' => null],
            ['id' => 2, 'title' => 'Sumsung', 'parent' => null],
            ['id' => 3, 'title' => 'Nokia', 'parent' => null],
            ['id' => 4, 'title' => 'Iphone', 'parent' => null],
            ['id' => 5, 'title' => 'Noute', 'parent' => null],
            ['id' => 6, 'title' => 'LG', 'parent' => 1],
            ['id' => 7, 'title' => 'Panassonic', 'parent' => 1],
            ['id' => 8, 'title' => 'Honor', 'parent' => 1],
            ['id' => 9, 'title' => 'Apple', 'parent' => 2],
            ['id' => 10, 'title' => 'Galaxy', 'parent' => 2],
            ['id' => 11, 'title' => 'Vivo', 'parent' => 3],
        ]);
    }
}