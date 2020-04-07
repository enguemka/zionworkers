<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Serie;
use Faker\Generator as Faker;

$factory->define(Serie::class, function (Faker $faker) {
    return [
        'slug' => $faker->slug,
        'title' => $faker->sentence(4),
        'lead' => $faker->text(100),
        'thumbnail' => $faker->imageUrl(300, 250),
        'read_time' => $faker->time('H:i:s', 'now'),
        'description' => $faker->text(200),
        'published_at' => $faker->dateTime(),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
