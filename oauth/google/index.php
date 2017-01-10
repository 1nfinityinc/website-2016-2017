<?php
require_once __DIR__ . '/../gplus-lib/vendor/autoload.php';
require '../database.php';
require '../../accounts/data/user-lib.php';


const CLIENT_ID = '';
const CLIENT_SECRET = '';
const REDIRECT_URI = 'http://1nfinityinc.cf/oauth/google';

session_start();

function closePopup() {
    print 
      '
      <html>
      <head>
        <script>
          function load() {
            window.opener.location.href="http://1nfinityinc.cf/home";
            window.close();
          }
        </script>
      </head>
      <body onload="load()">
      </body>
      </html>
    ';
  
  
}




/* 
 * INITIALIZATION
 *
 * Create a google client object
 * set the id,secret and redirect uri
 * set the scope variables if required
 * create google plus object
 */
$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->setScopes('email');

$plus = new Google_Service_Plus($client);

/*
 * PROCESS
 *
 * A. Pre-check for logout
 * B. Authentication and Access token
 * C. Retrive Data
 */

/* 
 * A. PRE-CHECK FOR LOGOUT
 * 
 * Unset the session variable in order to logout if already logged in    
 */
if (isset($_REQUEST['error'])) {
   session_unset();
   closePopup();
}
if (isset($_REQUEST['logout'])) {
   session_unset();
}

/* 
 * B. AUTHORIZATION AND ACCESS TOKEN
 *
 * If the request is a return url from the google server then
 *  1. authenticate code
 *  2. get the access token and store in session
 *  3. redirect to same url to eleminate the url varaibles sent by google
 */
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken(); //Not needed but keeping it
  $_SESSION['type'] = "google";
}

/* 
 * C. RETRIVE DATA
 * 
 * If access token if available in session 
 * load it to the client object and access the required profile data
 */
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  $me = $plus->people->get('me');
  // Get User data
  $_SESSION['uuid'] = $me['id'];
  $_SESSION['name'] = $me['displayName'];
  $_SESSION['email'] = $me['emails'][0]['value'];
  
  $confirm = false;
  $sql = 'SELECT * FROM user_data WHERE (user_uuid = "' . $me['id'] .  '")'; //Check for Email in database
  $result = mysqli_query($conn, $sql); 
  if (mysqli_num_rows($result) > 0) { //Make sure email is vaild first 
    while($row = mysqli_fetch_assoc($result)) { 
       $total = $row['total_signin'];
    }
    $total = $total + 1;
    $sql = 'UPDATE user_data SET total_signin=' . $total . ' WHERE (user_uuid="' . $me['id'] .  '")';
    if (mysqli_query($conn, $sql)) {
     $fake = false;
    } 
  }   
  //$profile_image_url = $me['image']['url'];
  //$cover_image_url = $me['cover']['coverPhoto']['url'];
  //$profile_url = $me['url'];
  closePopup();
}


?>

