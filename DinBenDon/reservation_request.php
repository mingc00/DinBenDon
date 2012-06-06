<?php
  require 'helper/autoload.php';
  require 'helper/login_check.php';

  $_params['rest'] = Restaurant::listAll();
  $_params['user'] = $_SESSION['userName'];
  require 'views/reservation_request.php';
?>