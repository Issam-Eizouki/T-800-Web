<?php
/**
 * PayPal Setting & API Credentials
 */
    
return [
        'client_id'  => env('PAYPAL_SANDBOX_CLIENT_ID'),
        'secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET'),
        'settings' => array(
            'mode' => env('PAYPAL_MODE', 'sandbox'),
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path().'/logs/paypal.log',
            'log.LogLevel' => 'ERROR',
        ),
        
        'currency' => env('PAYPAL_CURRENCY', 'EUR'),
        'locale' => env('PAYPAL_LOCALE', 'fr_FR'),
        'validate_ssl' => env('PAYPAL_VALIDATE_SSL', false),
];