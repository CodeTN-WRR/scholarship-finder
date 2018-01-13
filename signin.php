<?php /* This page contains all the necessary Javascript and CSS for signing in through Google and using the sign in button.
To include it, add the following PHP (when enclosed in the PHP brackets and in a .php file): "require 'signin.php' ".
To implement the button, make a div with the id "signinbutton".
"header.php" must be included at the beginning of the file that this one is included in. */ ?>

<script src="https://apis.google.com/js/api.js?onload=beginLoad" async defer></script>
<script>
    var isSignedInOnApp = <?php echo isLoggedIn() ? "true" : "false"; ?>;
    var GoogleAuthInstance;
    var buttonID = "signinbutton";
    var button;
    function beginLoad() {
        gapi.load("auth2", {callback: function() {
            gapi.auth2.init({
                client_id: "1002827436732-avkn4eo67advgdv9g2nkgum6nvenajgf.apps.googleusercontent.com",
                scope: "profile email",
                hosted_domain: "student.knoxschools.org"
            }).then(initGoogleAuth, GoogleAuthError);
        }});
    }
    function initGoogleAuth() {
        GoogleAuthInstance = gapi.auth2.getAuthInstance();        //The only thing the Google JS API is doing right now is signing the user out.
        button = document.getElementById(buttonID);
        button.innerHTML = "<span></span><span>" + (isSignedInOnApp ? "Sign out" : "Sign in with Google") + "</span>";      //you can check if signed in to Google with "GoogleAuthInstance.isSignedIn.get()", but what our server says is more important
        button.onclick = signInButtonHandler;
    }
    function GoogleAuthError() {
        alert("Google initialization error.");
    }
    function signInButtonHandler(event) {
        if(GoogleAuthInstance.isSignedIn.get()) {
            GoogleAuthInstance.signOut();
        }
        if(isSignedInOnApp) {
            window.location.href = "/signout.php";
        } else {
            window.location.href = "/signinredirect.php";
        }
    }
    
    //I need to check if signed in and find the expiration date of the token; access vs refresh tokens?
    //access tokens are refreshed
    //things like expiration date and revoked access could be checked in php when page is loaded, although that is maybe inefficient
    //maintain session; server needs to control whether you are logged in or not
    //style the Google sign-in button and get sign-in status from server (style- https://developers.google.com/identity/branding-guidelines)
    //how to ensure the user is still signed in when the PHP Session has expired but they are still logged in with Google? How to see if the ID token or access token is recent?
</script>

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
<style>
    #signinbutton {
        display: inline-block;
        background: white;
        color: #444;
        width: 190px;
        border-radius: 5px;
        border: thin solid #888;
        box-shadow: 1px 1px 1px grey;
        white-space: nowrap;
        cursor: pointer;
    }
    #signinbutton :first-child {
        background: url('https://developers.google.com/identity/sign-in/g-normal.png') transparent 5px 50% no-repeat;
        display: inline-block;
        vertical-align: middle;
        width: 42px;
        height: 42px;
    }
    #signinbutton :nth-child(2) {
        display: inline-block;
        vertical-align: middle;
        padding-left: 42px;
        padding-right: 42px;
        font-size: 14px;
        font-weight: bold;
        /* Use the Roboto font that is loaded from Google */
        font-family: 'Roboto', sans-serif;
    }
</style>