<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
	$name = $faker->unique()->sentence(rand(3,6));
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->paragraphs(rand(1,10),true)
    ];
});
