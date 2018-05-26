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
        /* tách ra nhiều vòng for như vậy để cho 1 post hoặc 1 product sẽ vào nhiều category và tag mà ko trùng lặp */
        
        // posts
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

        for ($i=1; $i < 50; $i++) {
        	DB::table('relationships')->insert([
	        	'object_id'	=> $i,
	        	'parent_id'	=> rand(6,25),
	        	'parent_type'	=> 'post_category',
	        ]);

	        DB::table('relationships')->insert([
	        	'object_id'	=> $i,
	        	'parent_id'	=> rand(6,12),
	        	'parent_type'	=> 'post_tag',
	        ]);
        }

        for ($i=1; $i < 50; $i++) {
        	DB::table('relationships')->insert([
	        	'object_id'	=> $i,
	        	'parent_id'	=> rand(26,100),
	        	'parent_type'	=> 'post_category',
	        ]);

	        DB::table('relationships')->insert([
	        	'object_id'	=> $i,
	        	'parent_id'	=> rand(12,20),
	        	'parent_type'	=> 'post_tag',
	        ]);
        }

        // products
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

        for ($i=1; $i < 80; $i++) {
        	DB::table('relationships')->insert([
	        	'object_id'	=> $i,
	        	'parent_id'	=> rand(6,25),
	        	'parent_type'	=> 'product_category',
	        ]);

	        DB::table('relationships')->insert([
	        	'object_id'	=> $i,
	        	'parent_id'	=> rand(6,12),
	        	'parent_type'	=> 'product_tag',
	        ]);
        }

        for ($i=1; $i < 80; $i++) {
        	DB::table('relationships')->insert([
	        	'object_id'	=> $i,
	        	'parent_id'	=> rand(26,100),
	        	'parent_type'	=> 'product_category',
	        ]);

	        DB::table('relationships')->insert([
	        	'object_id'	=> $i,
	        	'parent_id'	=> rand(12,20),
	        	'parent_type'	=> 'product_tag',
	        ]);
        }
    }
}
