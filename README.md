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
