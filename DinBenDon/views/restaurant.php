<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Restaurant Info - DinBenDon</title>
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
    <h1><?= $_params['rest']->name ?></h1>
  </div>
  <div class="span5">
    <p><?= $_params['rest']->comment ?></p>
    <table class="table table-striped">
      <caption>Menu</caption>
      <thead>
        <tr><th>Meal</th><th>Price</th></tr>
      </thead>
      <tbody>
      <?php foreach ($_params['menus'] as $m): ?>
        <tr><td><?= $m->name ?></td><td><?= $m->price ?></td></tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>