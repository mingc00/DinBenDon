<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Reservation Request - DinBenDon</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="static/css/common.css">
  <link rel="stylesheet" type="text/css" href="static/css/bootstrap-datepicker.css">
  <script type="text/javascript" src="static/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-dropdown.js"></script>
  <script type="text/javascript">
    $(function () {
      $('#dp').datepicker();
      showMenu();
    });
    function showMenu() {
      var restId = $('#restaurant').val();
      $.getJSON('ajax/get_menu_by_restid.php', {restid: restId}, function(data) {
        $('#menu').empty();
        $.each(data, function(i, e) {
          $('#menu').append($('<option></option>').val(e.menuId).html(e.name + '(price :' + e.price + ')'));
        });
      });
    }
    function userConfirm() {
      return confirm('Are you sure to make this request?');
    }
  </script>
  <style type="text/css">
    #user {
      text-align: center;
      font-size: 16px;
      font-weight: bold;
    }
  </style>
</head>
<body>
<?php require 'views/navbar.php'; ?>
<div class="container">
  <div id="header">
    <h1>Reservation Request</h1>
  </div>
  <p id="user">User :: <?= $_params['user'] ?></p>
  <p class="lead">Please fill the following information</p>
  <form class="form-horizontal" method="post" action="add_request.php" onsubmit="return userConfirm();">
    <fieldset>
      <div class="control-group">
        <label class="control-label" for="date">Date</label>
        <div class="controls">
          <input type="text" id="dp" name="date" value="" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="restaurant">Restaurant</label>
        <div class="controls">
          <select id="restaurant" name="restaurant" onchange="showMenu()">
          <?php
            foreach ($_params['rest'] as $restaurant) {
              echo '<option value="'.$restaurant->restId.'">'.$restaurant->name."</option>\n";
            }
          ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="menu">Menu</label>
        <div class="controls">
          <select id="menu" name="menu">
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="comment">Comment</label>
        <div class="controls">
          <textarea class="input-xlarge" name="comment" rows="3"></textarea>
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn" onclick="history.back();">Cancel</button>
      </div>
    </fieldset>
  </form>
</div>
</body>
</html>