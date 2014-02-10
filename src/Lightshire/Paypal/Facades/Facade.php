<?php
	namespace Lightshire\Paypal\Facades;

	use Illuminate\Support\Facades\Facade as IlluminateFacade;

	class Facade extends IlluminateFacade 
	{
		protected static function getFacadeAccessor()
		{
			return "paypal";
		}
	}