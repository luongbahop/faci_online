<?php
session_start();
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication('291929677589808','4ceef1f271f1e295f221f9731e496eda');
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://fit.utc.edu.vn/a' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
    // When Facebook returns an error
    die($ex->getMessage());
} catch( Exception $ex ) {
    // When validation fails or other local issues
    die($ex->getMessage());
}
// see if we have a session
if ( isset( $session ) ) {
    // graph api request for user data
    $fields = array('id', 'name', 'email');
    $request = new FacebookRequest( $session, 'GET', '/me?fields=' . implode(',', $fields) );
    $response = $request->execute();
    // get response
    $graphObject = $response->getGraphObject();
    $fbid = $graphObject->getProperty('id');   
    $fbfullname = $graphObject->getProperty('name'); 
    $fbemail = $graphObject->getProperty('email');    
    
    echo 'Faceook ID: '.$fbid.'<br />';
    echo 'Faceook name: '.$fbfullname.'<br />';
    echo 'Faceook email: '.$fbemail.'<br />';
  
} else {
    $loginUrl = $helper->getLoginUrl(array('email'));
    header("Location: ".$loginUrl);
}
?>