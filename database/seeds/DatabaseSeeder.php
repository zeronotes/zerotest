<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Category::class, 5)->create();
        $this->call(PageSeeder::class);
        $this->call(TagSeeder::class);
        $this->call([
            CategorySeeder::class,
            ProductCategorySeeder::class,
            ProductTagSeeder::class,
            RelationshipSeeder::class,
            
        ]);
        factory(App\Comment::class, 200)->create();
        factory(App\User::class, 25)->create();
        //factory(App\ProductCategory::class,5)->create();
        factory('App\Post',50)->create();
        factory('App\Product',80)->create();
    }
}
