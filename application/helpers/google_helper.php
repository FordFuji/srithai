<?php
//Include Google client library 
include_once 'google_src/Google_Client.php';
include_once 'google_src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */

$clientId = '335824533782-cae3cq32p7ut27g1lbqcck0vhi58b6e6.apps.googleusercontent.com';
$redirectURL = 'http://ford.ots.co.th/knockdoor/frontend/path/test_google';
$clientSecret = '5st1Gv0T6QIMO0KPqg8cJqn-';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login tresfashion.co');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);


// Include the google api php libraries
include_once APPPATH."helpers/google_src/Google_Client.php";
include_once APPPATH."helpers/google_src/contrib/Google_Oauth2Service.php";

// Google Project API Credentials
$clientId = '765410143793-de3l2dcr0s0q8kdqt7911nkcardaikae.apps.googleusercontent.com';
$clientSecret = '5On_W2vpvmknOYwSpuH51W9Q';
$redirectUrl = site_url('frontend/path/callback_google');

// Google Client Configuration
$gClient = new Google_Client();
$gClient->setApplicationName('Login tresfashion.co');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);
$google_oauthV2 = new Google_Oauth2Service($gClient);

if ($this->input->get('code') != '') {
	$gClient->authenticate();
	$this->session->set_userdata('token', $gClient->getAccessToken());
	redirect($redirectUrl);
}

$token = $this->session->userdata('token');
if (!empty($token)) {
	$gClient->setAccessToken($token);
}

// $authUrl
$authUrl = $gClient->createAuthUrl();
	
?>