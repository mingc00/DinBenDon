<?php
  require 'helper/autoload.php';
  session_start();
  if(isset($_GET['req'])) {

    $req = Request::find($_GET['req']);
    $rest = $req->getRestaurant();

    $_params['req'] = $req->reqId;
    $_params['date'] = $req->date;
    $_params['rest'] = $rest->name;
    $_params['menu'] = $rest->listMenu();

    require 'views/order_request.php';
  }
?>