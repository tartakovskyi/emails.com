<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Campaign;
use Faker\Generator as Faker;

$factory->define(Campaign::class, function (Faker $faker) {
	return [
		'camp_name' => $faker->sentence($maxNbWords = 3, $variableNbWords = true),
		'camp_status'=> $faker->numberBetween($min = 1, $max = 3),
		'camp_letter' => 'christmas'
	];
});