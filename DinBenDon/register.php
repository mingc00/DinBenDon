<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Register - DinBenDon</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="static/css/common.css">
  <script type="text/javascript" src="static/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-dropdown.js"></script>
  <script type="text/javascript" src="static/js/vaild.js"></script>
  </script>
</head>
<body>
<?php require 'views/navbar.php'; ?>
<div class="container">
  <div id="header">
    <h1>Create New User</h1>
  </div>
  <p class="lead">Please fill the following information</p>
  <form class="form-horizontal" method="post" action="add_user.php" onsubmit="return vaild(this)">
    <fieldset>
      <div class="control-group">
        <label class="control-label" for="fname">First Name</label>
        <div class="controls">
          <input type="text" name="fname" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="lname">Last Name</label>
        <div class="controls">
          <input type="text" name="lname" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="account">Account Name</label>
        <div class="controls">
          <input type="text" name="account" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="pass">Password</label>
        <div class="controls">
          <input type="password" name="pass" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="cpass">Confirm Password</label>
        <div class="controls">
          <input type="password" name="cpass" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="email">Email Address</label>
        <div class="controls">
          <input type="text" name="email" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="phone">Phone Number</label>
        <div class="controls">
          <input type="text" name="phone" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="ext">CCU Phone Extension</label>
        <div class="controls">
          <input type="text" name="ext" />
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn">Cancel</button>
      </div>
    </fieldset>
  </form>
</div>
</body>
</html>