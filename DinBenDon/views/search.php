<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Search - DinBenDon</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="static/css/common.css">
  <link rel="stylesheet" type="text/css" href="static/css/bootstrap-datepicker.css">
  <script type="text/javascript" src="static/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-tab.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-dropdown.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-modal.js"></script>
  <script type="text/javascript">
    $(function () {
      $('#tabList li:first-child, .tab-content>div:first-child').addClass('active');
      $('#tabList a').click(function (e){
        e.preventDefault();
        $(this).tab('show');
      });
      selectTabByReqId();

      $('#dp').datepicker();
    });

    function selectTabByReqId() {
      var match = window.location.href.match(/req=(\d+)/);
      if(match) {
        var reqId = match[1];
        $('#tab' + reqId).tab('show');
      }
    }

    function add_request() {
      window.location = './reservation_request.php';
    }

    function cancel_request() {
      var reqId = $('.tab-content div.active input[name="req"]').val();
      if(confirm('Are you sure to cancel this reserveartion?')) {
        $.ajax('ajax/cancel_request.php', {
          type: 'POST',
          data: {req: reqId},
          success: function(data) {
            alert(data);
            window.location.reload();
          }
        });
      }
    }

    function cancel_resv(resvId) {
      $.ajax('ajax/cancel_reservation.php', {
        type: 'POST',
        data: {resv: resvId},
        success: function(data) {
          alert(data);
          window.location.reload();
        }
      });
    }

    function change_issuer() {
      var reqId = $('.tab-content div.active input[name="req"]').val();
      $('#myModal input[name="reqid"]').val(reqId);
      $.getJSON('ajax/get_follower_by_reqid.php', {reqid: reqId}, function(data) {
        if(data && data.length > 0) {
          $('#userSelect').empty();
          for (var i = 0; i < data.length; i++)
            $('#userSelect').append($('<option></option>').val(data[i].uid).html(data[i].account));
          $('#myModal').modal();
        } else {
          alert('You are the only one in the order list');
        }
      });
    }

  </script>
  <style type="text/css">
    #user {
      text-align: center;
      font-size: 16px;
      font-weight: bold;
    }
    .table td {
      vertical-align: middle;
    }
    .order-info {
      text-align: center;
    }
    .form-actions {
      text-align: center;
    }
    .tab-content {
      overflow: visible;
    }
    .btn-group {
      display: inline-block;
    }
  </style>
</head>
<body>
<?php require 'views/navbar.php' ?>
<div class="container">
  <div id="header">
    <h1>Search</h1>
  </div>
  <p id="user">Hello, <?= isset($_SESSION['userName']) ? $_SESSION['userName'] : 'anonymouse' ?></p>
  <form class="well form-horizontal" method="get">
    <fieldset>
      <p>
        <span for="date">Date</span>
        <input class="" type="text" name="date" id="dp" value="<?= $_params['date'] ?>" />
        <button type="submit" class="btn">Search</button>
      </p>
      <span class="help-inline" for="date">Do you want to be an issuer?</span>
      <button type="button" class="btn" onclick="add_request()">Add a request</button>
    </fieldset>
  </form>
  <?php if(empty($_params['reqs'])): ?>
  <p>
    There is no reserveartion on <?= $_params['date'] ?><br />
    You can try to <a href="#" onclick="add_request()">be a issuer</a>!
  </p>
  <?php endif; ?>
  <div class="tabbable">
    <ul id="tabList" class="nav nav-tabs">
    <?php foreach ($_params['reqs'] as $r) : ?>
      <li><a href="#req<?= $r->reqId ?>" data-toggle="tab" id="tab<?= $r->reqId ?>"><?= $r->getRestaurant()->name ?></a></li>
    <?php endforeach; ?>
    </ul>
    <div class="tab-content">
    <?php
      foreach ($_params['reqs'] as $r) :
        $resvs = $r->getReservations();
        $issuer = $r->getUser();
    ?>
      <div class="tab-pane" id="req<?= $r->reqId ?>">
        <div class="order-info">
          <p>Issued by <a href="user.php?id=<?= $issuer->uid ?>"><?= $issuer->account ?></a> at <?= $r->date ?></p>
          <p>Restaurant: <a href="restaurant.php?rest=<?= $r->restId ?>"><?= $r->getRestaurant()->name ?></a></p>
          <p>Now with <?= count($resvs) ?> orders</p>
          <p>Comment: <?= $r->comment ?></p>
        </div>
        <table class="table">
          <thead>
            <tr><th>Participants</th><th>Order</th><th>Price</th><th>Cancel</th></tr>
          </thead>
          <tbody>
          <?php
            foreach ($resvs as $resv):
              $user = $resv->getUser();
              $menu = $resv->getMenu();
          ?>
            <tr>
              <td><a href="user.php?id=<?= $user->uid ?>"><?= $user->account ?></a></td>
              <td><?= $menu->name ?></td>
              <td><?= $menu->price ?></td>
              <td><?php if($_SESSION['uid'] == $user->uid): ?><a href="#" class="btn btn-danger" onclick="cancel_resv(<?= $resv->resvId ?>)">Cancel</a><?php endif; ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <form method="get" action="order_request.php">
          <input type="hidden" name="req" value="<?= $r->reqId ?>" />
          <div class="form-actions">
            <div class="btn-group">
              <button type="submit" class="btn btn-primary">Order at this restaurant</button>
            </div>
            <?php if($_SESSION['uid'] == $issuer->uid): ?>
            <div class="btn-group">
              <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
                Cancel
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#" onclick="cancel_request()">Cancel this reservation</a></li>
                <li><a href="#" onclick="change_issuer()">Change issuer</a></li>
              </ul>
            </div>
            <?php endif; ?>
          </div>
        </form>
      </div>
    <?php endforeach; ?>
      </div>
    </ul>
  </div>
</div>
<div class="modal hide" id="myModal">
  <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3>Change Issuer</h3>
  </div>
  <form method="post" action="change_issuer.php">
    <div class="modal-body">
      <p>Choose a new issuer</p>
        <fieldset>
          <input type="hidden" name="reqid" value=""/>
          <select name="user" id="userSelect">
          </select>
        </fieldset>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>
  </form>
</div>
</body>
</html>