<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once './vendor/autoload.php';


//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('286577150804-8qfbf77i9lj1rinqct5rpmdhbh1s7pst.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('mK0Mu55VSnxgciwU_LbiE0q_iENf');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('

');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?> 