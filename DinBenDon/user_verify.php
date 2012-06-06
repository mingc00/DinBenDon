<?php
  require 'helper/autoload.php';
  session_start();
  if(isset($_SESSION['uid'])) {
    print_r($_SESSION);
  } elseif(isset($_POST['account']) && isset($_POST['pass'])) {
    $user = User::findByAccount($_POST['account']);
    if($user->verify($_POST['pass']) == true) {
      $_SESSION['uid'] = $user->uid;
      $_SESSION['userName'] = $user->account;
      $_SESSION['userType'] = $user->type;

      $_params = array(
        'title' => 'Login Success',
        'state' => 'success',
        'message' => 'Redirect to search page',
        'redirectTo' => 'search.php'
      );

    } else {
      $_params = array(
        'title' => 'Login Fail',
        'state' => 'error',
        'message' => 'username or password is/are wrong'
      );
      echo 'fail';
    }
  } else {
    $_params = array(
        'title' => 'Login Fail',
        'state' => 'error',
        'message' => 'username or password is/are empty'
    );
  }
  require 'views/message.php';
?>