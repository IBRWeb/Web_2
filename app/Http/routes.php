<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');

Route::resource('oracion', 'PrayerController', ['except' => ['edit', 'update', 'destroy']]);

Route::get('devocional', 'DevotionalController@index');

Route::get('devocional/{slug}', ['as' => 'lookForDevotionalPostBySlug', 'uses' => 'DevotionalController@lookForPostBySlug']);

Route::get('devocional/{slug}/{id}', ['as' => 'devotionalPost', 'uses' => 'DevotionalController@showPost']);

Route::get('devocional/tag/{tag}', ['as' => 'tagPosts', 'uses' => 'DevotionalController@tagPosts' ]);

// Route::post('/contacto', '')

Route::get('test', function() {return view('emails.prayer');});

Route::get('/{view}', 'WebPageController@index')->where('view', '[a-z]+');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
