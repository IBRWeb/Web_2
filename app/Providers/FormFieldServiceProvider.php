<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Components\FormFieldBuilder;

class FormFieldServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('formField', function($app)
        {
            $formFieldBuilder = new FormFieldBuilder($app['form'], $app['view'],$app['translator'], $app['session.store'], $app['files'] );
            return $formFieldBuilder;
        });
	}

}
