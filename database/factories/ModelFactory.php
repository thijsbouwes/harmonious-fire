<?php

use App\Models\User;
use App\Models\Event;
use App\Models\Product;

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
}, 'user');

$factory->define(User::class, function (Faker\Generator $faker) {

    return [
        'name' => 'Thijs Bouwes',
        'email' => 'thijsbouwes@gmail.com',
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
}, 'admin');

$factory->define(Event::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->sentence(3),
        'cost' => $faker->randomFloat(2, 5, 100)
    ];
});

$factory->define(Product::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'cost' => $faker->randomFloat(2, 5, 100)
    ];
});