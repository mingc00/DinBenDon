<?php
  if(!isset($_SESSION))
    session_start();
  if(!isset($_SESSION['uid'])) {
    $_params = array(
      'state' => 'info',
      'title' => 'You Should Login!',
      'message' => "Please login to use this feature.",
      'redirectTo' => './login.php'
    );
    require 'views/message.php';
    exit;
  }
?>