<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>History - DinBenDon</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="static/css/common.css">
  <script type="text/javascript" src="static/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="static/js/bootstrap-dropdown.js"></script>

</head>
<body>
<?php require 'views/navbar.php'; ?>
<div class="container">
  <div id="header">
    <h1>History</h1>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Restaurant</th>
        <th>Order</th>
        <th>Price</th>
        <th>Detail</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($_params['resvs'] as $resv):
      $req = $resv->getRequest();
      $menu = $resv->getMenu();
    ?>
      <tr>
        <td><?= $req->date ?></td>
        <td><?= $req->getRestaurant()->name ?></td>
        <td><?= $menu->name ?></td>
        <td><?= $menu->price ?></td>
        <td><a href="search.php?date=<?= $req->date ?>&amp;req=<?= $req->reqId ?>">Link</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>