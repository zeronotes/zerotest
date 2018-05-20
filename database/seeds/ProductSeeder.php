<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
        	$name = str_random(20);
        	DB::table('products')->insert([
	        	'name'	=> $name,
	        	'slug'	=> str_slug($name),
	        	'price'	=> rand(10000,1000000),
	        	'featured_image' => rand(1,9).'.jpg',
	        	'in_stock' => 80,
	        	'on_order' => 5
	        ]);
        }
        
    }
}
