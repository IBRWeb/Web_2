<?php

use App\Http\Requests\WebPageRequest;

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
// Route::get('/{controller?}/{action?}', function($controller = 'home', $action = 'index'){
// 	$request        = new WebPageRequest($controller, $action);
// 	// $controller     = $request -> getController();
// 	// $action         = $request -> getAction();
// 	// $controllerPath = $request -> getControllerPath();
// 	$controller = $request -> callController();
// 	dd($controller);

// 	// $parameters = compact('controller', 'action', 'controllerPath');
// 	// $method = 'GET';
// 	// $controller -> callAction($method, $parameters);

// });

Route::get('/', 'HomeController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
