<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // create parent pages
        for ($i=1; $i <= 10; $i++) {
            $title = $faker->sentence();
            App\Post::insert([
                'title' => $title,
                'slug' => str_slug($title),
                'content' => $faker->paragraphs(rand(2,10), true),
                // 'featured_image' =>  rand(1,5).'.jpg',
                'author_id' => rand(1,25),
                'post_type' => 'page'
            ]);
        }

        // create children pages
        for ($i=11; $i <= 20; $i++) {
        	$title = $faker->sentence();
        	App\Post::insert([
        		'title' => $title,
		        'slug' => str_slug($title),
		        'content' => $faker->paragraphs(rand(2,10), true),
		        // 'featured_image' =>  rand(1,5).'.jpg',
		        'author_id' => rand(1,25),
		        'parent_id' => rand(1,5),
                'post_type' => 'page'
        	]);
        }
    }
}
