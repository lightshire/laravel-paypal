<?php
	namespace Lightshire\Paypal;

	use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

	class PaypalServiceProvider extends IlluminateServiceProvider
	{
		protected $defer = false;

		public function boot()
		{
			$this->package("lightshire/laravel-paypal");
			include __DIR__.'/../../routes.php';
		}

		public function register()
		{
			$this->app["paypal"] = $this->app->share(function($app)
			{
				return new Paypal;
			});
		}
		public function provides()
		{
			return array('paypal');
		}
	}