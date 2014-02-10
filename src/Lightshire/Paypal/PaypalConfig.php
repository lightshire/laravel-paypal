<?php
namespace Lightshire\Paypal;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PaypalConfig extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:paypalconfig';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'A Command that creates an sdk for the payPal package';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		//
			
		$filepath 	= base_path()."/vendor/paypal/sdk-core-php/lib/../config/sdk_config.ini";


		echo "the file is being saved to ".$filepath."..\n";
		
		$handle 	= fopen($filepath, 'w');

		echo "file saved and opened..\n";
		fclose($handle);
		echo "file is stored and closed..\n";
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			//no need for arguments
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
