<?php
function isLogged() {
  if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
    return true;
  } else {
    return false;
  }
}
function getEmail() {
  if (isset($_SESSION['email'])) {
    return $_SESSION['email'];
  } else {
    return "null";
  }
}
function getType() {
  if (isset($_SESSION['type'])) {
    return $_SESSION['type'];
  } else {
    return "null";
  }
}
?>