<?php

namespace Vimana\LaravelMP\Providers;

use Illuminate\Support\ServiceProvider;
use Vimana\LaravelMP\MP;

class LaravelMPServiceProvider extends ServiceProvider 
{

	protected $mp_app_id;
	protected $mp_app_secret;

	public function boot()
	{
		$this->publishes([__DIR__.'/../config/config.php' => config_path('config.php')]);
		
		$this->mp_app_id     = config('config.app_id');
		$this->mp_app_secret = config('config.app_secret');
	}

	public function register()
	{
		$this->app->singleton('MP', function(){
			return new MP($this->mp_app_id, $this->mp_app_secret);
		});
	}
}