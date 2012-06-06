<?php
require 'error.php';
  require 'helper/login_check.php';
  require 'helper/autoload.php';
  $_params['resvs'] = Reservation::listByUser($_SESSION['uid']);
  require 'views/history.php';
?>