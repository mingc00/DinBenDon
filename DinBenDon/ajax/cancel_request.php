<?php
  require '../helper/autoload.php';
  session_start();
  if(isset($_SESSION['uid'])) {
    $request = Request::find($_POST['req']);
    if($request->by == $_SESSION['uid']) {
      $resvs = $request->getReservations();
      if(Request::delete($_POST['req'])) {
        $msg = 'Success';
        foreach ($resvs as $r) {
          $user = $r->getUser();
          if($user->uid == $_SESSION['uid'])
            continue;
          $userName = $user->account;
          $restName = $request->getRestaurant()->name;
          $email = $user->email;
          $date = $request->date;
          $link = 'http://'.$_SERVER['HTTP_HOST'].dirname(dirname($_SERVER['REQUEST_URI'])).'/search.php?date='.$date;
          Mail::sendCancellation($email, $userName, $restName, $date, $link);
        }
      } else {
        $msg = 'Fail to cancel';
      }
    } else {
      $msg = 'You are not the issuer';
    }
  } else {
    $msg = 'You should login to cancel this request';
  }
  echo $msg;
?>