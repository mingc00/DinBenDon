<?php
  require '../helper/autoload.php';
  session_start();
  if(isset($_POST['resv'], $_SESSION['uid'])) {
    $resv = Reservation::find($_POST['resv']);
    if($resv->by == $_SESSION['uid']) {
      if(Reservation::delete($_POST['resv'])) {
        $msg = 'Success';
      } else {
        $msg = 'Fail to cancel';
      }
    } else {
      $msg = "This reservation isn't owned to you";
    }
  } else {
    $msg = 'You should login to cancel this reservation';
  }
  echo $msg;
?>