<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ProductCategory::all();

        Product::factory()->count(5)->create()->each(function ($product) use ($categories) {
            $product->categories()->attach($categories->random(rand(1, 3)));
        });
    }
}
