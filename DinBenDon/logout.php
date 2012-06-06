<?php
  session_start();
  session_unset();
  $_params = array(
      'state' => 'success',
      'title' => 'Logout Sucess!',
      'message' => "You had been logout from DinBenDon system.",
      'redirectTo' => './index.php'
  );
  require 'views/message.php';
?>