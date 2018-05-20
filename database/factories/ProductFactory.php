<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
	$name = $faker->unique()->sentence();
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'price' => rand(100000,1000000),
        'featured_image' => rand(1,25).'.jpg',
        'description' => $faker->paragraphs(rand(1,10), true),
        'in_stock' => 100,
        'on_order' => rand(1,5)
    ];
});
