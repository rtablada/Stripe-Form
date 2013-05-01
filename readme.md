# The only Stripe form builder for Laravel

When integrating Stripe in your blade views wouldn't it be awesome to just say `{{ StripeForm::build(25) }}` and have a full Stripe.js enabled form embedded with a charge of $25?

Well, that's what we are setting out to accomplish in this new package.

## Progress

Getting to this awesome syntax is gonna take some coding, but we've already started making things easier for those of you who want to integrate a Stripe Connect button in your application!

## Installation

Include this package in your composer.json `rtablada/stripe-forms`.

Then pull in and update your config file: `php artisan config:publish rtablada/stripe-forms`.

In your App config add this to your Service Providers: `'Rtablada\StripeForms\StripeFormsServiceProvider',`

In your App config add this to your Facades: `'ConnectButton'   => 'Rtablada\StripeForms\StripeConnectButtonFacade',`

## Stripe Connect Button

Instead of worrying about the ugly syntax of creating an anchor tag with a long query string to build your Stripe Connect buttons, you can just use this builder.

