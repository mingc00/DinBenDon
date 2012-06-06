<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>DinBenDon</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="static/css/common.css">
  <script type="text/javascript" src="static/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-dropdown.js"></script>
</head>
<body>
<?php require 'views/navbar.php'; ?>
<div class="container">
  <div class="page-header">
    <h1>Login</h1>
  </div>
  <div class="row">
    <div class="span4">
      <h2>Create New User</h2>
      <p>
        In order to use full features of DinBenDon system.
        You should register for it.
        If you don't have one, get it for free right now!
      </p>
      <p><a href="register.php" class="btn">Register</a></p>
    </div>
    <div class="span4 offset3">
      <form class="well" method="post" action="user_verify.php">
        <label for="account">Username<input type="text" name="account" /></label>
        <label for="pass">Password<input type="password" name="pass" /></label>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>