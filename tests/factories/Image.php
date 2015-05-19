<?php 

$factory('App\Image', [

	'name' => $faker->word,
	'path_to_file' => $faker->imageUrl(1000, 1000)

]);