<?php
include_once("../google_src/Google_Client.php");
include_once("../google_src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '425323481764-7e6ghkq1904gu3bi4h0g07oc29788mc0.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'as7KEWWHq3gIddZzC28r3Inj'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost:8888/user/security/auth?authclient=google.';  //return url (url to script)
$homeUrl = 'http://localhost:8888/';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('yii2 hello app');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);
$google_oauthV2 = new Google_Oauth2Service($gClient);
?>