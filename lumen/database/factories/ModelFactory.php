<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Tools::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'link' => $faker->url,
        'description' => $faker->text,
    ];
});

/**
 * Factory definition for model App\Task.
 */
$factory->define(App\Tags::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});
