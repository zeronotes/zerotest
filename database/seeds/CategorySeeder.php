<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'Cate Demo ';
        $slug = 'cate-demo-';
        $description = 'This is description. This is description. This is description. This is description. This is description. This is description of category demo ';
        $short_description = 'This is short description of category demo ';
        for ($i=1; $i <= 5; $i++) { 
        	App\Category::insert([
        		'name' => $name.$i,
        		'slug' => $slug.$i,
        		'description' => $description.$i,
                'short_description' => $description.$i,
        	]);
        }
        for ($i=6; $i <= 25; $i++) { 
        	App\Category::insert([
        		'name' => $name.$i,
        		'slug' => $slug.$i,
        		'description' => $description.$i,
                'short_description' => $short_description.$i,
        		'parent_id' => rand(1,5)
        	]);
        }
        for ($i=26; $i <= 100; $i++) { 
        	App\Category::insert([
        		'name' => $name.$i,
        		'slug' => $slug.$i,
        		'description' => $description.$i,
                'short_description' => $short_description.$i,
        		'parent_id' => rand(6,25)
        	]);
        }
    }
}
