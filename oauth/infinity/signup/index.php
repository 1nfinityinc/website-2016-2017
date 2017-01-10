<?php
require_once "../../database.php";
require_once "../../infinity-lib/infinity-lib.php";
require_once "PHPMailer-master/PHPMailerAutoload.php";
session_start();
if(isset($_POST['email'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['pass'];

  
  $client = new InfinityAccounts();
  $client->Signup($conn, $name, $email, $password);

  if ($client->getStatus() == true) {
    //$token = $client->GenNewToken(); //Its not really needed for WebBased, but I'm not making a mobile and a web API
    print 'passed';
   
	}
}


?>