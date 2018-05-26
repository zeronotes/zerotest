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
        $description = 'This is description of category demo ';
        for ($i=1; $i <= 5; $i++) { 
        	App\Category::insert([
        		'name' => $name.$i,
        		'slug' => $slug.$i,
        		'description' => $description.$i,
        	]);
        }
        for ($i=6; $i <= 25; $i++) { 
        	App\Category::insert([
        		'name' => $name.$i,
        		'slug' => $slug.$i,
        		'description' => $description.$i,
        		'parent_id' => rand(1,5)
        	]);
        }
        for ($i=26; $i <= 100; $i++) { 
        	App\Category::insert([
        		'name' => $name.$i,
        		'slug' => $slug.$i,
        		'description' => $description.$i,
        		'parent_id' => rand(6,25)
        	]);
        }
    }
}
