<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>DinBenDon</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="static/css/common.css">
  <script type="text/javascript" src="static/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-dropdown.js"></script>
  <style type="text/css">
    #banner {
      margin-top: 40px;
    }
  </style>
</head>
<body>
<?php require 'views/navbar.php'; ?>
<div class="container">
  <div class="hero-unit" id="banner">
    <h1>DinBenDon</h1>
    <p>Are you hungry? DinBenDon GO! Just 2 steps: search by date and order.</p>
    <p><a href="search.php" class="btn btn-primary">EAT</a></p>
  </div>
</div>
</body>
</html>