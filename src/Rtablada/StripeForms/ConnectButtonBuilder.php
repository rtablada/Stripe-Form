<?php namespace Rtablada\StripeForms;

use Illuminate\Html\HtmlBuilder as Html;
use Illuminate\Session\Store as Session;

/**
* Allows easy creation of Stripe Connect Buttons
*/
class ConnectButtonBuilder
{
	/**
	 * The HTML builder instance.
	 *
	 * @var \Illuminate\Html\HtmlBuilder
	 */
	protected $html;

	/**
	 * The CSRF token used by the form builder.
	 *
	 * @var string
	 */
	protected $csrfToken;

	/**
	 * The session store implementation.
	 *
	 * @var \Illuminate\Session\Store
	 */
	protected $session;

	/**
	 * Create a new button builder instance.
	 *
	 * @param  \Illuminate\Html\HtmlBuilder  $html
	 * @param  string  $csrfToken
	 * @return void
	 */
	public function __construct(Html $html, $csrfToken)
	{
		$this->html = $html;
		$this->csrfToken = $csrfToken;
	}

	/**
	 * Creates a Stripe Connect Button with style
	 * @return string
	 */
	public function button($userData)
	{
		$client_id = $this->getClientId();

		$data = array(
			'response_type'	=> 'code',
			'client_id'		=> $client_id,
			'scope'			=> 'read_write',
			'state'			=> $this->csrfToken,
			'stripe_user'		=> $userData
		);
		$query = http_build_query($data);
		$url = "https://connect.stripe.com/oauth/authorize?{$query}";
		return "<a href=\"{$url}\" class=\"stripe-connect\"><span>Connect with Stripe</span></a>";

	}

	public function buttonWithStyle($userData)
	{
		$button = $this->button($userData);
		$styleStub = \File::get(__DIR__ . '/style.stub.txt');
		$style = "<style>{$styleStub}</style>";

		return $style . $button;
	}

	public function getClientId()
	{
		if($client_id = \Config::get('stripe.client_id')){
			return $client_id;
		} else {
			return \Config::get('stripe-forms::stripe.client_id');
		}
	}
}
