<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //model factories
       /* Category::factory(5)->create();
        Product::factory(10)->create();
        ProductImage::factory(20)->create(); */


        $categories = Category::factory(5)->create();
        $categories->each(function($category){
            $products = Product::factory(10)->make();
            $category->products()->saveMany($products);

            $products->each(function($p){
                $images = ProductImage::factory(20)->make();
                $p->images()->saveMany($images);
            });
        });


    }
}
