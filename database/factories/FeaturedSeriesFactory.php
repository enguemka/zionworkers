<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FeaturedSerie;
use App\Post;
use Faker\Generator as Faker;

$factory->define(FeaturedSerie::class, function (Faker $faker) {
    return [
        'serie_id' => function () use($faker) {
            $series = factory(App\Serie::class)->create();
            $series->posts()->saveMany(factory(Post::class, $faker->randomDigitNot(0))->make());
            $series->posts()->saveMany(factory(Post::class, $faker->randomDigitNot(0))->make(['auth_locked' => 1]));
            return $series->id;
        },
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'start_at' => $faker->dateTime(),
        'end_at' => $faker->dateTime()
    ];
});
