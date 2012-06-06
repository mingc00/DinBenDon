<?php
  require '../helper/autoload.php';
  $result = array();
  if(isset($_GET['restid'])) {
    $result = Menu::listByRestId($_GET['restid']);
  }
  echo json_encode($result);
?>