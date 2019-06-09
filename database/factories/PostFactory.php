<?php

use Faker\Generator as Faker;
use App\Post;
use App\User;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' =>  User::all()->random()->id,
        'body' => $faker->text
    ];
});
