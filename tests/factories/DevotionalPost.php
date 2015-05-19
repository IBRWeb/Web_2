<?php 

$factory('App\DevotionalPost', [

	'title' => $faker->unique()->sentence,
    'slug' => $faker->unique()->slug,
    'content' => $faker->text(1000),
    'created_at' => $faker->date

]);