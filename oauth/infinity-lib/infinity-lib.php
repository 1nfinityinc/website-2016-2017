<?php
/* 

  _____        __ _       _ _                                           _       
 |_   _|      / _(_)     (_) |           /\                            | |      
   | |  _ __ | |_ _ _ __  _| |_ _   _   /  \   ___ ___ ___  _   _ _ __ | |_ ___ 
   | | | '_ \|  _| | '_ \| | __| | | | / /\ \ / __/ __/ _ \| | | | '_ \| __/ __|
  _| |_| | | | | | | | | | | |_| |_| |/ ____ \ (_| (_| (_) | |_| | | | | |_\__ \
 |_____|_| |_|_| |_|_| |_|_|\__|\__, /_/    \_\___\___\___/ \__,_|_| |_|\__|___/
                                 __/ |                                          
                                |___/  by Brendan Fuller (c) 2016                         
 */
class InfinityAccounts {
  private $type = "none";
  private $status = false; //Account Status TRUE/FALSE
  private $error; //Error Message
  private $conn; //Database Connection
  private $table_name = "users";
  public $data = Array(); //Data array to Store all the infomation in
  
  /*
    This signs in the user with EMAIL and PASSWORD parameters.
    If correct the STATUS will change, else ERROR will have a 
    message retaining what has occured.
  */
  public function Signin($conn, $email, $pass) {
    $this->type = "in";
    $sql = 'SELECT * FROM ' . $this->table_name .  ' WHERE (email = "' . $email .  '")'; //Check for Email in database
    $result = mysqli_query($conn, $sql); 
    if (mysqli_num_rows($result) > 0) { //Make sure email is vaild first 
      while($row = mysqli_fetch_assoc($result)) { //Loop through all which isn't needed but works
        if ($row['password'] == SPEICAL_HASHING($pass)))) { //Check pass //I removed has for reasons
            $this->data['uuid'] = $row['uuid']; //Get UUID from database
            $this->data['email'] = $email; //Set Email too because why not
            $this->data['name'] = $row['name'];
          return true;
        } else {
          $this->error = "Invaild Username or Password";
        }
      }
    } 
  }
            
  /*
    This signs up the user with EMAIL and PASSWORD parameters.
    If correct the STATUS will change, else ERROR will have a 
    message retaining what has occured.
  */            
  public function Signup($conn, $name, $email, $pass) {
    $this->type = "up";
   if ($this->usedEmail($conn, $email) == 'false') {
     $password = SPEICAL_HASHING($pass); //I removed has for reasons
     $name = preg_replace('/[^a-zA-Z0-9\s]/', '', strip_tags(html_entity_decode($name)));
     $uuid = $this->UUIDGet();
     $sql = 'INSERT INTO ' . $this->table_name .  ' (uuid, name, email, password, email_confirmed) VALUES ("' . $uuid . '", "' . $name . '", "' . $email .'" , "' . $password .'", false)';
     if (mysqli_query($conn, $sql)) {
          $this->status = true;
          $this->data['uuid'] = $uuid; //Get UUID from database
          $this->data['email'] = $email; //Set Email too because why not
          $this->data['name'] = $name;
      } else {
          $this->status = false;
          $this->error = 'Database Error: ' . mysqli_error($conn);
      }
   } else {
     $this->error = "This email is already associated with an account!";
   }   
  }          
            
            
            
            
  /*
    This usedEmail function checks if a email is already being used
  */          
  public function usedEmail($conn, $email) {
    $sql = 'SELECT * FROM ' . $this->table_name .  ' WHERE (email = "' . $email .  '")'; //Check for Email in database
    $result = mysqli_query($conn, $sql); 
    $valid = true;
    if (mysqli_num_rows($result) > 0) { //Make sure email is vaild first   
      $valid = true;
    } else {
      $valid = false;
    }
    if ($valid) {
      return 'true';
    } else {
      return 'false';
    }
  }        
  /*
   This generates a UUID
  */            
  private function UUIDGet()
  {
     return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),
        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,
        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,
        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
     );
  }         
  /*
    It gets the STATUS
  */
  public function getStatus() {
    return $this->status;
  }
  /*
    It gets the ERRORS
  */
  public function getError() {
    return $this->error;
  }   
}
                  