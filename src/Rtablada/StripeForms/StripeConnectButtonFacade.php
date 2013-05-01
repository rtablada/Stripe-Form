<?php namespace Rtablada\StripeForms;

use Illuminate\Support\Facades\Facade;

class StripeConnectButtonFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'connectButton'; }

}