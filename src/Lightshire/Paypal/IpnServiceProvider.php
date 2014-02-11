<?php
	namespace Lightshire\Paypal;

	use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

	class IpnServiceProvider extends IlluminateServiceProvider
	{
		protected $defer = false;
		
		public function register()
		{
			$this->app["IpnListener"] = $this->app->share(function($app) {
				return new IpnListener;
			});
		}
	}