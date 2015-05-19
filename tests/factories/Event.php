<?php 

$factory('App\Event', [

	'title'       => $faker -> sentence,
	'description' => $faker -> paragraph,
	'event_time'  => $faker -> dateTimeBetween('now', '2 years'),
	'image_id'    => 'factory:App\Image'

]);