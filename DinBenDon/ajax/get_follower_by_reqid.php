<?php
  require '../helper/autoload.php';
  if(isset($_GET['reqid'])) {
    $req = Request::find($_GET['reqid']);
    $resvs = $req->getReservations();
    $isserId = $req->by;
    $result = array();
    foreach ($resvs as $resv) {
      $user = $resv->getUser();
      if($isserId == $user->uid || isset($result[$user->account]))
        continue;
      if(!isset($result[$user->uid]))
        $result[$user->uid] = array('uid'=> $user->uid, 'account'=> $user->account);
    }
    echo json_encode(array_values($result));
  }
?>