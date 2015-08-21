<?php

return [
	'testSecretKey' => env('STRIPE_TEST_SECRET_KEY'),
	'testPublishableKey' => env('STRIPE_TEST_PUBLISHABLE_KEY'),
	'liveSecretKey' => env('STRIPE_LIVE_SECRET_KEY'),
	'livePublishableKey' => env('STRIPE_LIVE_PUBLISHABLE_KEY')
];