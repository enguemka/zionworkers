<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'description' => $faker->text(120),
        'content' => $faker->text(2000),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'published_at' => $faker->dateTime()
    ];
});
