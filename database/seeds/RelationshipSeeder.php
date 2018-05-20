<?php

use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 50; $i++) {
        	DB::table('relationships')->insert([
	        	'object_id'	=> $i,
	        	'parent_id'	=> rand(1,5),
	        	'parent_type'	=> 'post_category',
	        ]);

	        DB::table('relationships')->insert([
	        	'object_id'	=> $i,
	        	'parent_id'	=> rand(1,5),
	        	'parent_type'	=> 'post_tag',
	        ]);
        }

        for ($i=1; $i < 80; $i++) {
        	DB::table('relationships')->insert([
	        	'object_id'	=> $i,
	        	'parent_id'	=> rand(1,5),
	        	'parent_type'	=> 'product_category',
	        ]);

	        DB::table('relationships')->insert([
	        	'object_id'	=> $i,
	        	'parent_id'	=> rand(1,5),
	        	'parent_type'	=> 'product_tag',
	        ]);
        }
    }
}
