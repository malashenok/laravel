<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {

    return [
        'title' => $faker->realText(rand(10, 20)),
        'text' => $faker->realText(rand(100, 255)),
        'category_id' => rand(1, 5),
        'isPrivate' => (bool)rand(0, 1)
    ];
});
