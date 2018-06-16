<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$name = 'Tag demo ';
    	$slug = 'tag-demo-';
        $description = 'This is description of tag ';
        for ($i=1; $i <= 20; $i++) {
        	DB::table('tags')->insert([
	        	'name'	=> $name . $i,
	        	'slug'	=> $slug. $i,
                'description' => $description.$i
	        ]);
        }
    }
}
