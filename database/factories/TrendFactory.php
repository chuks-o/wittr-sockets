<?php

use Faker\Generator as Faker;
use App\Trend;

$factory->define(Trend::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->state,
        'locale' => $faker->languageCode
    ];
});
