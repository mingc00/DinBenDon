<?php
  require 'helper/autoload.php';
  require 'helper/login_check.php';
  $_params['user'] = User::find($_SESSION['uid']);
  require 'views/setting.php';
?>