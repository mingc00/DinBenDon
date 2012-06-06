<?php
  require 'helper/autoload.php';
  require 'helper/login_check.php';
  if(isset($_POST['req'], $_POST['menu'])) {
    $resv = new Reservation();

    $resv->timestamp = date('Y-m-d H:i:s', time());
    $resv->by = $_SESSION['uid'];
    $resv->reqId = $_POST['req'];
    $resv->menu = $_POST['menu'];

    if($resv->insert()) {
      $_params = array(
        'state' => 'success',
        'title' => 'Submission Accepted',
        'message' => "Your request is added to database.",
        'redirectTo' => './search.php?date='.$_POST['date'].'&req='.$_POST['req']
      );
    } else {
      $_params = array(
        'state' => 'error',
        'title' => 'Submission Fail',
        'message' => "Field(s) missing",
        'redirectTo' => './order_request.php?req='.$_POST['req']
      );
    }
  }
  require 'views/message.php';
?>