<?php
  require 'helper/autoload.php';
  session_start();
  if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['account']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['phone'])) {
    $user = new User();
    $user->firstName = $_POST['fname'];
    $user->lastName = $_POST['lname'];
    $user->account = $_POST['account'];
    $user->password = md5($_POST['pass']);
    $user->email = $_POST['email'];
    $user->phone = $_POST['phone'];
    $user->type = 's';
    if(isset($_POST['ext']))
      $user->ext = $_POST['ext'];
    if($user->insert()) {
      $_params = array(
        'title' => 'Register Success',
        'state' => 'success',
        'message' => 'Redirect to search page',
        'redirectTo' => 'search.php'
      );
    }
  } else {
    $_params = array(
        'title' => 'Register Fail',
        'state' => 'error',
        'message' => 'incomplement'
      );
  }
  require 'views/message.php';
?>