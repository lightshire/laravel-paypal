<?php
	namespace Lightshire\Paypal;

	require base_path()."/vendor/autoload.php";


	use App;
	use Config;


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
			

			
			$accessToken 	= $creds->getAccessToken(array('mode'=>$mode));	 
		
			return array(
					'creds' 	=> $creds,
					'token' 	=> $token
				);
		}

		public static function getTokenCreds()
		{
			$client_id 	= Config::get('laravel-paypal:client_id');
			$secret 	= Config::get('laravel-paypal:secret');
			$mode 		= Config::get('laravel-paypal:mode');

			$encodedID 	= base64_encode($client_id.":".$secret);
			$headers 	= array(
					// 'Authorization' => 'Basic '.$encodedID,
					'Accept' 			=>  "application/json",
					'Accept-Language'	=> 'en_US'
				); 

			$params 	= array(
					'grant_type' 	=> 'client_credentials'
				); 

			$url 		= "https://api.sandbox.paypal.com/v1/oauth2/token";

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFTER, 1);
			curl_setopt($ch, CURLOPT_USRPWD, $client_id.":".$secret);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
			
			$response = curl_exec($ch);

			curl_close($ch);

			return $response;
		}
	}