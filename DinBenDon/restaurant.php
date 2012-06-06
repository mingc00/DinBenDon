<?php
  require 'helper/autoload.php';
  session_start();
  if(isset($_GET['rest'])) {
    $rest = Restaurant::find($_GET['rest']);
    $_params['rest'] = $rest;
    $_params['menus'] = $rest->listMenu();
    require 'views/restaurant.php';
  }
?>