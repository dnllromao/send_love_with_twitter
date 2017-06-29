<?php

	// Import TwitterOAuth class
	require 'vendor/autoload.php';
	use Abraham\TwitterOAuth\TwitterOAuth;

	//Define global variables
	define('CONSUMER_KEY', 'wV01D7WvfQlI282AqMnaR2Kms');
	define('CONSUMER_SECRET', 'eM9JAhP8aLvD2BvFC9RhOGOOR9sbGnTLlhPgFYmy8Mmi9RBujc');
	define('OAUTH_CALLBACK', 'http://localhost/beCode/twitter/callback.php');

	/*unset($_SESSION['oauth_token']);
	unset($_SESSION['oauth_token_secret']);
	unset($_SESSION['access_token']);*/

	if(!isset($_SESSION['access_token'])) {
		// Connection (HOW?)
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
		//var_dump($connection);

		//Generating a request_token
		$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
		//var_dump($request_token);

		// storing request_token
		$_SESSION['oauth_token'] = $request_token['oauth_token'];
		$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

		//Build authorize URL
		$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));

	} else {
		//Pull credencials from SESSION storage
		$access_token = $_SESSION['access_token'];

		// Connection with user credencials/ as user
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
		//var_dump($connection);

		//Get account details
		$user = $connection->get("account/verify_credentials");
		$friends = $connection->get("friends/list");
		//var_dump($friends);
	}
	
