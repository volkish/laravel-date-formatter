<?php

namespace Volkish\Laravel;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class DateFormatterServiceProvider extends ServiceProvider
{

	public function boot()
	{
		/** @noinspection PhpUndefinedFunctionInspection */
		$this->publishes([
			__DIR__ . '/../config/date_formatter.php' => config_path('date_formatter'),
		]);
	}

	public function register()
	{
		// merge default config
		$this->mergeConfigFrom(
			__DIR__ . '/../config/date_formatter.php',
			'date_formatter'
		);

		$this->app->singleton(DateFormatter::class, function (Application $app) {
			/** @noinspection PhpUndefinedMethodInspection */
			return new DateFormatter($app['config']->get('date_formatter'));
		});
	}

	public function provides()
	{
		return [
			DateFormatter::class,
		];
	}

}