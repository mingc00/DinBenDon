<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>User Information - DinBenDon</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="static/css/common.css">
  <script type="text/javascript" src="static/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-dropdown.js"></script>
  <style type="text/css">
    table {
      margin-top: 10px;
    }
  </style>
</head>
<body>
<?php require 'views/navbar.php'; ?>
<div class="container">
  <div id="header">
    <h1>User Information</h1>
  </div>
  <div class="span5">
    <table class="table table-striped">
      <thead>
        <tr><th colspan="2">Contact Details</th></tr>
      </thead>
      <tbody>
        <tr><th>Name</th><td><?= $_params['user']->firstName.' '.$_params['user']->lastName ?></td></tr>
        <tr><th>Account</th><td><?= $_params['user']->account ?></td></tr>
        <tr><th>Email</th><td><a href="mailto:<?= $_params['user']->email ?>"><?= $_params['user']->email ?></a></td></tr>
        <tr><th>Phone</th><td><?= $_params['user']->phone ?></td></tr>
        <?php if(!empty($_params['user']->ext)): ?>
        <tr><th>Ext</th><td><?= $_params['user']->ext ?></td></tr>
        <?php endif; ?>
      </tbody>
    </table>
    <?php if($_params['user']->uid == $_SESSION['uid']): ?>
    <p>
      <a href="setting.php" class="btn btn-primary">Edit</a>
    </p>
    <?php endif; ?>
  </div>
</div>
</body>
</html>