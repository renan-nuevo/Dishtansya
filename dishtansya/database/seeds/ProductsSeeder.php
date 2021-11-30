<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:table('products')->insert([
            'id' => rand(10, 100),
            'name' => Str::random(10),
            'available_stock' => rand(10, 100),
        ]);
    }
}
