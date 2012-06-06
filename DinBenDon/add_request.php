<?php
  require 'error.php';
  require 'helper/autoload.php';
  require 'helper/login_check.php';
  if(isset($_POST['date'], $_POST['restaurant'], $_POST['menu'], $_POST['comment'])) {
    $req = new Request();
    $req->date = $_POST['date'];
    $req->by = $_SESSION['uid'];
    $req->restId = $_POST['restaurant'];
    $req->comment = $_POST['comment'];
    $req->reqId = $req->insert();

    $resv = new Reservation();
    $resv->timestamp = date('Y-m-d H:i:s', time());
    $resv->by = $_SESSION['uid'];
    $resv->reqId = $req->reqId;
    $resv->menu = $_POST['menu'];
    if($resv->insert()) {
      $_params = array(
        'state' => 'success',
        'title' => 'Submission Accepted',
        'message' => "Your request is added to database.",
        'redirectTo' => './search.php?date='.$_POST['date']
      );
    } else {
      $_params = array(
        'state' => 'error',
        'title' => 'Submission Fail',
        'message' => "Field(s) missing",
        'redirectTo' => './reservation_request.php'
      );
    }
  }
  require 'views/message.php';
?>