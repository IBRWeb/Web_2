<?php 

$factory('App\Tag', [

	'name'        => $faker->unique()->word,
	'description' => $faker->sentence

]);
