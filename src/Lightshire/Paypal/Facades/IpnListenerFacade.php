<?php
	namespace Lightshire\Paypal\Facades;

	use Illuminate\Support\Facades\Facade as IlluminateFacade;

	class IpnListenerFacade extends IlluminateFacade
	{
		protected static function getFacadeAccessor()
		{
			return "IpnListener";
		}
	}