<?php
use Faker\Generator as Faker;
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
$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Question::class, function (Faker $faker) {

    return [
        'question' => $faker->sentence,
        'type_id' => rand(1,4)
    ];
});

$factory->define(App\Survey::class, function (Faker $faker) {

    $min = rand(12, 100);
    $max = rand($min, 100);

    return [
        'survey' => $faker->sentence,
        'min_age' => $min,
        'max_age' => $max
    ];
});
