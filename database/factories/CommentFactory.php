<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'parent_id' => rand(1,50),
        'parent_type' => 'product',
        'author_id' => rand(1,5),
        'content' => $faker->sentence()
    ];
});
