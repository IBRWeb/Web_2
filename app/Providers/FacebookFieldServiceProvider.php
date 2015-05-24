<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Components\Facebook\FacebookFieldBuilder;

class FacebookFieldServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
    {


	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('facebookField', function($app)
        {
            return new FacebookFieldBuilder($app['view']);
        });
	}

}
