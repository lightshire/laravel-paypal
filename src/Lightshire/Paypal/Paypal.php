<?php
	namespace Lightshire\Paypal;

	require base_path()."/vendor/autoload.php";


	use App;
	use Config;


	class Paypal
	{
		private $creds 			= null;
		private $token 			= null;
		private $scope 			= null;
		private $token_type		= null;
		private static $instance = null;


		public function __construct($data = null)
		{
			if($data) {
				$this->scope 		= $data->scope;
				$this->token 		= $data->access_token;
				$this->token_type 	= $data->token_type;
				$this->creds 		= $data;
			}

		}



		public static function getTokenCreds()
		{
			
			

			// $client_id 	= Config::get('lightshire.laravel-paypal.config');
			$client_id 	= Config::get('laravel-paypal::config.client_id'); 
			$secret 	= Config::get('laravel-paypal::config.secret');
			$mode 		= Config::get('laravel-paypal::config.mode');
			$endPoint 	= Config::get('laravel-paypal::config.endpoint');
;
			$headers 	= array(
					// 'Authorization' => 'Basic '.$encodedID,
					'Accept: application/json',
					'Content-Type: application/x-www-form-urlencoded'
				); 

			$params 	= array(
					'grant_type' 	=> 'client_credentials'
				); 

			$url 		= $endPoint."/v1/oauth2/token";


	

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			curl_setopt($ch, CURLOPT_USERPWD, $client_id.":".$secret);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params, '', '&'));
			
			$response = curl_exec($ch);

			curl_close($ch);

			return json_decode($response);
		}

		public static function make()
		{
			$creds 		= Paypal::getTokenCreds();
			$paypal 	= new Paypal($creds);
			self::$instance = $paypal;
			return self::$instance;
		}

		public static function getInstance()
		{
			return self::$instance;
		}

		public function toArray()
		{
			$array = array();
			$array["creds"] 		= $this->creds;
			$array["token"] 		= $this->token;
			$array["scope"] 		= $this->scope;
			$array["token_type"]	= $this->token_type;
			return $array;
		}


	}