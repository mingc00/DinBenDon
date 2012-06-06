<?php
  require 'helper/autoload.php';
  session_start();
  if(isset($_GET['id'])) {
    $_params['user'] = User::find($_GET['id']);
    require 'views/user.php';
  }
?>