<?php
require "header.php";
//There are 3 cases where this page is called: a new user signs in, a user had signed out or had moved to a new browser and now signed back in, and the URL was accessed directly.
//One improvement that should be made is to also store the timestamp that the access token expires in the session and check on every page if it has expired. If it has, the user has to sign in again.
//Being signed out of Google does not mean that the user is signed out of our site. Being singed in or not on our site is determined by whether the access token exists in the session.


if(isset($_GET["code"])) {       //if the GET parameter called "code" is set, the response is more likely from a Google sign in
    $client = new Google_Client();
    $client->setAuthConfig('/home/ubuntu/client_secret.json');
    $client->setRedirectUri("https://williamscholarship-williamdev.c9users.io/signincallback.php");     //this was required for authenticate() to work; I'm not totally sure whether the redirect was actually used or not, though
    $authResult = $client->authenticate($_GET["code"]);      //returns an object with access_token, id_token, token_type, and some timestamp stuff
    $accessToken = $client->getAccessToken();   //or $authResult["access_token"]
    $idTokenDecoded = $client->verifyIdToken($authResult["id_token"]);
    if($idTokenDecoded["hd"] != "student.knoxschools.org") {        //it might be possible that the client can get around the required hosted domain; verify it here
        redirect($_SERVER['HTTP_HOST'] . '/signinfailed');     //does not exist right now; not very important
        die;
    }
    
    $_SESSION["accessToken"] = $accessToken;
    
    //This is where we will add the data for a new user obtained above to the database.
    
    /*$oauth2Service = new Google_Service_Oauth2($client);      //this service gets user information; most of it seems to be in the id token already, however
    $userinfo = $oauth2Service->userinfo->get();*/
}

redirectToHome();
?>