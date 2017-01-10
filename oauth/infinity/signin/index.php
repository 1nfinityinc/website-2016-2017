<?php
require_once "../../database.php";
require_once "../../infinity-lib/infinity-lib.php";
require_once '../../../accounts/data/user-lib.php';

session_start();
if(isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = $_POST['pass'];
 
  $client = new InfinityAccounts();
  $client->Signin($conn, $email, $password);

  if ($client->Signin($conn, $email, $password) == true) {
    //$token = $client->GenNewToken(); //Its not really needed for WebBased, but I'm not making a mobile and a web API
    $_SESSION['access_token'] = $client->data['uuid'];
    $_SESSION['uuid'] = $client->data['uuid'];
    $_SESSION['email'] = $client->data['email'];
    $_SESSION['name'] = $client->data['name'];
    session_write_close();    
    
    $user = new UserData($conn, $_SESSION['uuid']);
    
    $confirm = false;
    $sql = 'SELECT * FROM user_data WHERE (user_uuid = "' . $client->data['uuid'] .  '")'; //Check for Email in database
    $result = mysqli_query($conn, $sql); 
    if (mysqli_num_rows($result) > 0) { //Make sure email is vaild first 
      while($row = mysqli_fetch_assoc($result)) { 
         $total = $row['total_signin'];
      }
      $total = $total + 1;
      $sql = 'UPDATE user_data SET total_signin=' . $total . ' WHERE (user_uuid="' . $client->data['uuid'] .  '")';
      if (mysqli_query($conn, $sql)) {
        print "passed"; //Tells Jquery to reload page or such
      } else {
        print 'Database Error: ' . $sql;
      }
    } else {
        print 'Database Error: ' . $sql;
    }
  } else {
    print $client->getError();
  }
}


?>