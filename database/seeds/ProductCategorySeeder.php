<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'Product Cate ';
        $slug = 'product-cate-';
        $description = 'This is description of product category ';
        for ($i=1; $i <= 5; $i++) { 
        	App\ProductCategory::insert([
        		'name' => $name.$i,
        		'slug' => $slug.$i,
        		'description' => $description.$i,
        	]);
        }
        for ($i=6; $i <= 25; $i++) { 
        	App\ProductCategory::insert([
        		'name' => $name.$i,
        		'slug' => $slug.$i,
        		'description' => $description.$i,
        		'parent_id' => rand(1,5)
        	]);
        }
        for ($i=26; $i <= 100; $i++) { 
        	App\ProductCategory::insert([
        		'name' => $name.$i,
        		'slug' => $slug.$i,
        		'description' => $description.$i,
        		'parent_id' => rand(6,25)
        	]);
        }
    }
}
