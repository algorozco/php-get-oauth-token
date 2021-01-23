<?php
require_once 'vendor/autoload.php';
$apikey =;
$client_id=;
$client_secret=;
$client = new HelloSign\Client($apikey);


    // Create the OAuthTokenRequest object
    $oauth_request = new HelloSign\OAuthTokenRequest(array(
        'code'          => '', //Get this from the oauth callback url
        'state'         => '', //Get this from the oauth callback url
        'grant_type'    => 'authorization_code',
        'client_id'     => client_id,
        'client_secret' => client_secret
    ));

// Request OAuth token for the first time
    $token = $client->requestOAuthToken($oauth_request);

// Export token to array, store it to use later
$hellosign_oauth = $token->toArray();

// Populate token from array
$token = new HelloSign\OAuthToken($hellosign_oauth);

// Refresh token if it is expired
//$client->refreshOAuthToken($token);

// instantiate the HelloSign client with the user's OAuth access token
$client = new HelloSign\Client($token);
//print token for fun
echo json_encode($hellosign_oauth);
?>
