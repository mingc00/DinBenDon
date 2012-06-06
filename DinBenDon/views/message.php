<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Add Reservation - DinBenDon</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="static/css/common.css">
  <script type="text/javascript" src="static/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-dropdown.js"></script>
</head>
<body>
<?php require 'views/navbar.php'; ?>
<?php
  $statesList = array('error' => 'alert-error', 'success' => 'alert-success', 'info' => 'alert-info');
  $state = isset($_params['state']) ? $statesList[$_params['state']] : $statesList['info'];
?>
<div class="container">
  <div id="header">
    <h1><?= $_params['title'] ?></h1>
  </div>
  <div class="alert <?= $state ?>">
    <h4 class="alert-heading"><?= ucfirst($_params['state']) ?></h4>
    <p><?= $_params['message'] ?></p>
    <?php if(isset($_params['redirectTo'])): ?>
    <p>
      The page will redirect in 5 secs. Click <a href="<?= $_params['redirectTo'] ?>">here</a> to the page right now.
    </p>
    <script type="text/javascript">
      setTimeout("window.location = '<?= $_params['redirectTo'] ?>'", 5000);
    </script>
    <?php endif; ?>
  </div>
</div>
</body>
</html>