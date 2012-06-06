<?php
  require 'helper/autoload.php';
  session_start();
  if(isset($_SESSION['uid'], $_POST['reqid'], $_POST['user'])) {
    $req = Request::find($_POST['reqid']);
    if($req->by == $_SESSION['uid']) {
      if($req->changeIssuer($_POST['user'])) {
        header("Location: ./search.php?date=$req->date&req=${_POST['reqid']}");
      }
      else {
        $_params = array(
        'state' => 'error',
        'title' => 'Change Issuer Error',
        'message' => "Contact the admin",
        );
        require 'views/message.php';
      }
    } else {
      $_params = array(
      'state' => 'error',
      'title' => 'Change Issuer Error',
      'message' => "This is not your request",
      );
      require 'views/message.php';
    }
  }
?>