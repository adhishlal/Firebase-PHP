<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'YOUR_FIREBASE_API_ACCESS_KEY' );
$registrationIds = array( $_GET['id'] );
// prep the bundle
$msg = array
(
	'body' 	=> $_GET['body'],
	'title'		=> $_GET['title'],
	'vibrate'	=> 1,
	'sound'		=> 1,
);
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'notification'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;
?>