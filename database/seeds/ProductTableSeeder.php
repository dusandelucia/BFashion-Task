<?php

use Illuminate\Database\Seeder;
use Illuminate\Support;
use Illuminate\Support\Facades;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facades\DB::table('products')->insert([
            'name' => Support\Str::random(20),
            'price' => rand(10, 200),
            'brand_id' => rand(1, App\Brand::count())
        ]);
    }
}
