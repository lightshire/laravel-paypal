<?php
	namespace Lightshire\Paypal;

	require base_path()."/vendor/autoload.php";


	use App;
	use Config;
	use PayPal\Auth\OAuthTokenCredential;


	class Paypal
	{
		private $creds = null;
		private $token = null;

		public function __construct()
		{
			$data = Paypal::launch();
			$this->creds = $data["creds"];
			$this->token = $data["token"];

		}

		public static function launch()
		{
			$client_id 	= Config::get('laravel-paypal:client_id');
			$secret 	= Config::get('laravel-paypal:secret');
			$mode 		= Config::get('laravel-paypal:mode');

			$creds 			= new OAuthTokenCredential($client_id, $secret);
			$accessToken 	= $creds->getAccessToken(array('mode'=>$mode));	 
		
			return array(
					'creds' 	=> $creds,
					'token' 	=> $token
				);
		}
	}