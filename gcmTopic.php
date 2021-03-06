<?php


// API access key from Google API's Console
define( 'API_ACCESS_KEY', '' );


$registrationIds = array(" " );

// prep the bundle
$msg = array
(
    'message'       => '',
    'tag'         => '',
    'phone'      => '',
    'tickerText'    => 'Ticker text here...',
    'vibrate'   => 1,
    'sound'     => 1
);

$fields = array
(
	'to'=>  '/topics/global',
    'data'=> $msg
);

$headers = array
(
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'
);

$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

echo $result;
?>