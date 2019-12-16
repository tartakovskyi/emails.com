<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Group;
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

$factory->define(Group::class, function (Faker $faker) {
	return [
		'group_name' => $faker->sentence($maxNbWords = 3, $variableNbWords = true),
		'group_description' => $faker->text($maxNbChars = 500),
		'group_status' => $faker->boolean($chanceOfGettingTrue = 75)
	];
});
