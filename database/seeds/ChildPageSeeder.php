<?php

use Illuminate\Database\Seeder;

class ChildPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=11; $i <= 20; $i++) {
        	$title = $faker->sentence();
        	App\Page::insert([
        		'title' => $title,
		        'slug' => str_slug($title),
		        'content' => $faker->paragraphs(rand(2,10), true),
		        // 'featured_image' =>  rand(1,5).'.jpg',
		        'author_id' => rand(1,25),
		        'parent_id' => rand(1,5)
        	]);
        }
    }
}
