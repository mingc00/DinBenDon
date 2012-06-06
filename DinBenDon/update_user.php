<?php
  require 'helper/autoload.php';
  require 'helper/login_check.php';
  $user = User::find($_SESSION['uid']);
  if(isset($_POST['email'], $_POST['phone'], $_POST['ext'])) {
    $user->email = $_POST['email'];
    $uesr->phone = $_POST['phone'];
    $user->ext = $_POST['ext'];
  }
  if(isset($_POST['pass']) && !empty($_POST['pass'])) {
    $user->password = md5($_POST['pass']);
  }
  $user->update();
  $_params = array(
    'state' => 'success',
    'title' => 'Submission Accepted',
    'message' => "Your profile is updated",
    'redirectTo' => './user.php?id='.$user->uid
  );
  require 'views/message.php';
?>