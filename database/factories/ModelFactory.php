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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'pseudo' => $faker->company,
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Foyers\Foyer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company
    ];
});

$factory->define(App\Models\Foyers\FoyerUser::class, function (Faker\Generator $faker) {
  return [];
});

$factory->define(App\Models\Housework::class, function (Faker\Generator $faker) {
  return [
    'fr' => $faker->name,
    'en' => $faker->name,
    'de' => $faker->name,
    'color' => $faker->name,
    'b64' => $faker->name
  ];
});
