<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Recipient;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Recipient::class, function (Faker $faker) {
    return [
    	'email' => $faker->unique()->email,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'group_id' => $faker->randomDigitNot(0),
        'status' => $faker->boolean($chanceOfGettingTrue = 70)
    ];
});
