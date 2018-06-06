<?php

use Faker\Generator as Faker;

$factory->define(App\Page::class, function (Faker $faker) {
    $title = $faker->sentence();
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'content' => $faker->paragraphs(rand(2,10), true),
        'featured_image' =>  rand(1,5).'.jpg',
        'author_id' => rand(1,25),
    ];
});
