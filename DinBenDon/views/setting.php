<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Setting - DinBenDon</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="static/css/common.css">
  <script type="text/javascript" src="static/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-dropdown.js"></script>
  <script type="text/javascript" src="static/js/vaild.js"></script>
</head>
<body>
<?php require 'views/navbar.php'; ?>
<div class="container">
  <div id="header">
    <h1>Profile Update</h1>
  </div>
  <p class="lead">You can update your personal profile</p>
  <form class="form-horizontal" method="post" action="update_user.php" onsubmit="return vaild(this)">
    <fieldset>
      <div class="control-group">
        <label class="control-label">Account Name</label>
        <div class="controls">
          <span class="uneditable-input"><?= $_params['user']->account ?></span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="pass">Password</label>
        <div class="controls">
          <input type="password" name="pass" />
          <span class="help-inline">Just keep it empty if you don't want to change password</span>
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
          <input type="text" name="email" value="<?= $_params['user']->email ?>"/>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="phone">Phone Number</label>
        <div class="controls">
          <input type="text" name="phone" value="<?= $_params['user']->phone ?>"/>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="ext">CCU Phone Extension</label>
        <div class="controls">
          <input type="text" name="ext" value="<?= $_params['user']->ext ?>"/>
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