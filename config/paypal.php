<?php

return [
	'client_id' => env('PAYPAL_ID'),

	'secret' => env('PAYPAL_SECRET'),

	'settings' => [
		'http.CURLOPT_CONNECTTIMEOUT' => 30,
		'mode' => 'sandbox',	// live
		'log.LogEnabled' => 'true',
		'log.FileName' => storage_path().'/logs/paypal.php',
		'log.LogLevel' => 'INFO',
	],
];

?>