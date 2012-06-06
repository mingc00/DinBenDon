<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Order Request - DinBenDon</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="static/css/common.css">
  <script type="text/javascript" src="static/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-dropdown.js"></script>
  <style type="text/css">
    .form-inline {
      font-size: 20px;
    }
  </style>
</head>
<body>
<?php require 'views/navbar.php'; ?>
<div class="container">
  <div id="header">
    <h1>Order Request</h1>
  </div>
  <p class="lead">Please fill the following information</p>
  <form class="form-horizontal" method="post" action="add_reservation.php">
    <fieldset>
      <div class="control-group">
        <label class="control-label" for="date">Date</label>
        <div class="controls">
          <span class="help-inline form-inline"><?= $_params['date'] ?></span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="restaurant">Restaurant</label>
        <div class="controls">
          <span class="help-inline form-inline"><?= $_params['rest'] ?></span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="menu">Menu</label>
        <div class="controls">
          <select name="menu">
            <?php
              foreach ($_params['menu'] as $m) {
                printf("<option value=\"%s\">%s(price: %d)</option>\n", $m->menuId, $m->name, $m->price);
              }
            ?>
          </select>
        </div>
      </div>
      <input type="hidden" name="req" value="<?= $_params['req'] ?>" />
      <input type="hidden" name="date" value="<?= $_params['date'] ?>" />
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn" onclick="history.back()">Cancel</button>
      </div>
    </fieldset>
  </form>
</div>
</body>
</html>