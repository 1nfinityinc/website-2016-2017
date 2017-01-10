<?php
/* 
  Checks if user is logged inLogin from where doesn't matter 
  ACCESS_TOKEN from 3rd Party is needed and random
  ACCESS_TOKEN from 1nfinty is also random (for api and app needs) (use of firebase)
*/
if (isset($_SESSION['access_token'])) {
   print '<a href="../accounts/" style="color: lightgreen; cursor: pointer;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Account Dashboard"><i class="fa fa-dashboard" aria-hidden="true"></i> <span id="accountText">Dashboard</span></a> ';
} else {
  print '<a onClick="openModal(\'#account\')" style="color: orange; cursor: pointer;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Signin|Signup"><i class="fa fa-user" aria-hidden="true"></i> <span id="accountText">Sign In</span></a> ';
}
?>