<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName(1, true),
    ];
});

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'title' => $faker->sentences(1, true),
        'description' => $faker->paragraphs(1, true),
        'status' => 1,
    ];
});

$factory->define(App\Gift::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'path' => 'gift/b',
        'points' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});
$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
