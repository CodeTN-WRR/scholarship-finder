<?php
require "header.php";
//This is called when the sign in button is clicked. It redirects the user to the Google sign in page and sets up the necessary parameters. The same 3 cases listed in /oauth2callback apply here.
//$this->logger->info("Slim-Skeleton '/' route");

$client = new Google_Client();
$client->setAuthConfig('/home/ubuntu/client_secret.json');
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
$client->setHostedDomain("student.knoxschools.org");        //it is possible this could be edited by the client; it is verified in "/signincallback.php"
$client->setRedirectUri('https://' . $_SERVER['HTTP_HOST'] . '/signincallback.php');

$authUrl = $client->createAuthUrl();

redirect($authUrl);
?>