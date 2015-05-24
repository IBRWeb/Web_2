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

Route::group(['namespace' => 'Devotional', 'prefix' => 'devocional'], function()
{
    Route::get('/', 'DevotionalController@index');

    Route::get('{slug}', ['as' => 'lookForDevotionalPostBySlug', 'uses' => 'DevotionalController@lookForPostBySlug']);

    Route::get('{slug}/{id}', ['as' => 'devotionalPost', 'uses' => 'DevotionalController@showPost']);

    Route::get('tag/{tag}', ['as' => 'tagPosts', 'uses' => 'DevotionalController@tagPosts' ]);
});

Route::group(['namespace' => 'Gallery', 'prefix' => 'gallery'], function()
{
    Route::get('albums', 'GalleryController@showAlbums');

    Route::resource('albums.photos', 'GalleryController');

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['namespace' => 'Webpage'], function()
{
    Route::get('/', 'HomeController@index');

    Route::resource('oracion', 'PrayerController', ['except' => ['edit', 'update', 'destroy']]);

    Route::get('contacto', 'ContactController@index');

    Route::post('contacto', 'ContactController@post');

    Route::get('{view}', 'WebPageController@index')->where('view', '[a-z]+');
});
