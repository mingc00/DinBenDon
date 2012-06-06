<?php
  require 'helper/autoload.php';
  session_start();
  $_params['date'] = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d', time());
  $_params['reqs'] = Request::listByDate($_params['date']);

  require 'views/search.php';
?>