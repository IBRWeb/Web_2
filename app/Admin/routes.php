<?php

Route::get('', ['as' => 'admin.home', 'uses' => '\App\Http\Controllers\Admin\AdminController@index']);

Route::get('artisan', ['as' => 'admin.artisan', 'uses' => '\App\Http\Controllers\Admin\ArtisanController@index']);

Route::get('test', function(){

    dd(AdminAuth::user());
});