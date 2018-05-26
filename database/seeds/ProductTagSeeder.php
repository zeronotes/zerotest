<?php

use Illuminate\Database\Seeder;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'Product Tag ';
    	$slug = 'product-tag-';
        for ($i=1; $i <= 20; $i++) {
        	DB::table('product_tags')->insert([
	        	'name'	=> $name . $i,
	        	'slug'	=> $slug. $i,
	        ]);
        }
    }
}
