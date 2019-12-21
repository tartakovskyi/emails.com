<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Campaign;
use Faker\Generator as Faker;

$factory->define(Campaign::class, function (Faker $faker) {
	return [
		'camp_name' => $faker->sentence($maxNbWords = 3, $variableNbWords = true),
		'camp_status'=> $faker->numberBetween($min = 1, $max = 3),
		'camp_letter' => '
		<h1>Dear {{$name}}</h1>
		<p>It’s the happy time of the year again! CBC store has yet again opened a new branch, this time near your home! We are pleased to inform you that you can now shop for all varieties and types of clothes and jewelry only a few miles away from your house!</p>
		<p>Our new range of jewels for women and apparel for men include a host of colorful and attractive purchases that will make you look just fine for the approaching festive season! We’re eager to accrue as many customers as possible, and we invite you to be one of the many prized ones.</p>
		<p>We hope you will be a consistent buyer and an eternal member of our family. We wish you and your family the heartiest of the season’s greetings.</p>
		<p>Regards,<br>
		{{config("app.name")]}}</p>
		'
	];
});