<?php 
	session_start();

	// Import TwitterOAuth class
	require "vendor/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	//Define global variables
	define('CONSUMER_KEY', 'wV01D7WvfQlI282AqMnaR2Kms');
	define('CONSUMER_SECRET', 'eM9JAhP8aLvD2BvFC9RhOGOOR9sbGnTLlhPgFYmy8Mmi9RBujc');
	define('OAUTH_CALLBACK', 'http://localhost/beCode/twitter/callback.php');

	// Check oauth_token 
	$request_token = [];
	$request_token['oauth_token'] = $_SESSION['oauth_token'];
	$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];

	if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token']) {
	    echo 'Abort! Something is wrong.';
	    exit;
	    //die();
	}

	// Bootstrapping with user tokens
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);
	//var_dump($connection);

	//Get acess_token
	$access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $_REQUEST['oauth_verifier']]);
	var_dump($access_token);

	//Credentials storage
	$_SESSION['access_token'] = $access_token;

	// redirect user back to index page
	header('Location: ./');


