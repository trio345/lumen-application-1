<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});


$factory->define('App\Author', function (Faker $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->email,
        'password' => $faker->password,
        'profile' => $faker->text,
        'salt' => $faker->regexify('[A-Za-z0-9](5)')
    ];
});

$factory->define('App\Post', function (Faker $faker) {
    return [
        'title' => $faker->word,
        'content' => $faker->sentence,
        'tags' => $faker->word,
        'status' => "terkirim",
        'author_id' => $faker->numberBetween($min = 1, $max = 10)
    ];
});

$factory->define('App\Comment', function (Faker $faker) {
    return [
        'content' => $faker->text,
        'author_id' => $faker->numberBetween($min= 1, $max = 10),
        'email' => $faker->email,
        'url' => $faker->url,
        'post_id' => $faker->numberBetween($min= 1, $max = 10)
    ];
});
