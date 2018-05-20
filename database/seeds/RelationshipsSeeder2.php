<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50; $i++) {
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

        for ($i=0; $i < 80; $i++) {
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
