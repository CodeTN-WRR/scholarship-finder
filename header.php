<?php
//this file defines helper functions and initializes the session. Include it with "require 'header.php'" (or require_once) at the beginning of a file.
//it would be best if this file was automatically included in every file with the auto_prepend_file directive in an Apache .conf file (located under /etc/Apache2), but there might be difficulties in putting that on Github.
//another helpful .conf file addition could be "AddHandler application/x-httpd-php .html", which lets PHP run in html files
//It would be good to have a function in here that echoes some default header HTML and another function that echoes some default parts of the body (such as the menu at the top). This way, the site-wide code is all in one place and easily added where it is needed.

require __DIR__ . '/backend/scholarship-finder/vendor/autoload.php';
session_start();

function isLoggedIn() {
    return isset($_SESSION["accessToken"]);
}

function redirect($url) {       //this will only work at the beginning of a file- it can't be during
    header("Location: " . $url);
}

function redirectToHome() {
    header("Location: " . "/");
}

?>