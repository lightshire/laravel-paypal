###OVERVIEW
This paypal laravel wrapper is created for simultaneous or bulk differentials in the paypal sandbox. This is a pet project for my own REST API for a reservation system. (LOLS)

###INSTALLATION
add the following from your `composer.json`

```json
	"lightshire/laravel-paypal": "dev-master"
```

####SERVICE PROVIDER
```php
	'providers'	=> array(
			'Lightshire\Paypal\PaypalServiceProvider'
		)
```
####FACADE
```php
'facades' 	=> array(
			'Paypal' 		  => 'Lightshire\Paypal\Facades\Facade'
		)
```
#####Uses
	-there is no definite use as of the moment!


####deploying config files
You could easily deploy the config files by running
```php
	php artisan config:publish lightshire/laravel-paypal
```

you should see the following 
```php
	return array(
			'endpoint' 		=> 'api.sandbox.paypal.com',
			'client_id'		=> 'nil',
			'secret' 		=> 'nil',
			'mode' 			=> 'sandbox'
		);
```

change `mode` with `live` or `sandbox` depending on your paypal configuration.

Once you have already created your own paypal application you will be given a `Client ID` and a `Secret`. Those values should replace the `nil` inside the array.

####Adding pre-made artisan commands
an artisan command `command:paypalconfig` was created in order to easily edit the embedded `sdk_config.ini` of the paypal API. to install:

add the following to `app/start/artisan.php`

```php
Artisan::add(new Lightshire\Paypal\PaypalConfig);
```


####Initiating a Paypal instance connection
To initiate a paypal instance, after all configuration
```php
Paypal::make();
```

since there will only be one instance per connection, directly creating an nstance via `new Paypal` would not override the instance, instead run the `make` method. To get the current instance, connect via:
```php
Paypal::getInstance()
```

###Using the Instant Payment Notification of Paypal
for secure transactions paypal requires to have a vaiable callback
to initiate an IPNListener 

example

```php

$mode 		= Config::get('laravel-paypal::config.mode');
$listener 	= new IpnListener();

if($mode == 'sandbox') {
	$listener->use_sandbox = true;
}

try {
	$verified = $listener->processIpn();
}catch(Exception $exs) {
	//an error occured
	exit(0);
}

if($verified) {
	//verified
}else {
	//not verified
}

```


You could also directly wait for a confirmation that would return `true` or `false` by using

```php
Paypal::IPNConfirmer()
````

####Credits
Credits to 
	-https://github.com/Quixotix/PHP-PayPal-IPN