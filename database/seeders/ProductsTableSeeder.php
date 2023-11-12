<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Apple iPhone 14', 'description' => 'description iPhone', 'slug' => 'slug 1', 'price' => 10, 'qty' => 1, 'leng' => '15', 'width' => '8', 'weight' => '7', 'category_id' => 4],
            ['name' => 'Honor X7a Plus', 'description' => 'description Honor', 'slug' => 'slug 2', 'price' => 12, 'qty' => 1, 'leng' => '12', 'width' => '2', 'weight' => '2', 'category_id' => 5],
            ['name' => 'Samsung Galaxy A24', 'description' => 'description Galaxy', 'slug' => 'slug 3', 'price' => 13, 'qty' => 1, 'leng' => '13', 'width' => '3', 'weight' => '3', 'category_id' => 6],
            ['name' => 'Vivo Y17s 128/6Gb', 'description' => 'description Y17s', 'slug' => 'slug 4', 'price' => 14, 'qty' => 1, 'leng' => '14', 'width' => '4', 'weight' => '4', 'category_id' => 6],
            ['name' => 'OPPO A58 128GB', 'description' => 'description OPPO', 'slug' => 'slug 5', 'price' => 15, 'qty' => 1, 'leng' => '15', 'width' => '5', 'weight' => '5', 'category_id' => 7],
            ['name' => 'Vivo Y02t 64/4GB', 'description' => 'description Vivo', 'slug' => 'slug 6', 'price' => 16, 'qty' => 1, 'leng' => '16', 'width' => '6', 'weight' => '6', 'category_id' => 8],
            ['name' => 'Nokia Y02t', 'description' => 'description Nokia', 'slug' => 'slug 7', 'price' => 17, 'qty' => 1, 'leng' => '17', 'width' => '7', 'weight' => '7', 'category_id' => 9],
            ['name' => 'Samsung Galaxy A10', 'description' => 'description Samsung', 'slug' => 'slug 8', 'price' => 18, 'qty' => 1, 'leng' => '18', 'width' => '8', 'weight' => '8', 'category_id' => 10],
            ['name' => 'Vivo Y17s', 'description' => 'description Vivo', 'slug' => 'slug 9', 'price' => 19, 'qty' => 1, 'leng' => '19', 'width' => '9', 'weight' => '9', 'category_id' => 11],
            ['name' => 'OPPO A58', 'description' => 'description OPPO', 'slug' => 'slug 10', 'price' => 20, 'qty' => 1, 'leng' => '20', 'width' => '10', 'weight' => '10', 'category_id' => 5],
            ['name' => 'Apple iPhone 13 Pro', 'description' => 'description Apple', 'slug' => 'slug 11', 'price' => 21, 'qty' => 1, 'leng' => '21', 'width' => '11', 'weight' => '11', 'category_id' => 6],
            ['name' => 'Honor X7a', 'description' => 'description Honor', 'slug' => 'slug 12', 'price' => 22, 'qty' => 1, 'leng' => '22', 'width' => '12', 'weight' => '12', 'category_id' => 7],
            ['name' => 'Samsung Galaxy X', 'description' => 'description Galaxy', 'slug' => 'slug 13', 'price' => 23, 'qty' => 1, 'leng' => '23', 'width' => '13', 'weight' => '13', 'category_id' => 7],
            ['name' => 'Apple iPhone 14 Pro Max', 'description' => 'description Pro Max', 'slug' => 'slug 14', 'price' => 24, 'qty' => 1, 'leng' => '24', 'width' => '14', 'weight' => '14', 'category_id' => 11],
            ['name' => 'Vivo Y', 'description' => 'description Vivo', 'slug' => 'slug 15', 'price' => 25, 'qty' => 1, 'leng' => '25', 'width' => '15', 'weight' => '15', 'category_id' => 10],
            ['name' => 'iPhone', 'description' => 'description iPhone', 'slug' => 'slug 16', 'price' => 26, 'qty' => 1, 'leng' => '26', 'width' => '16', 'weight' => '16', 'category_id' => 10],
            ['name' => 'OPPO', 'description' => 'description OPPO', 'slug' => 'slug 17', 'price' => 27, 'qty' => 1, 'leng' => '27', 'width' => '17', 'weight' => '17', 'category_id' => 10],
        ]);
    }
}