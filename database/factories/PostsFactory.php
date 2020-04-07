<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'lead' => $faker->text(100),
        'thumbnail' => $faker->imageUrl(640, 480),
        'read_time' => $faker->time('H:i:s', 'now'),
        'auth_locked' => 0,
        'description' => $faker->text(200),
        'content' => $faker->text(2000),
        'published_at' => $faker->dateTime()
    ];
});
