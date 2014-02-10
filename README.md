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