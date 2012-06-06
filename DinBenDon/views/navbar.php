<?php
  $uri = basename($_SERVER['REQUEST_URI']);
  $list = array(
    array('Home', 'index.php', 'icon-home'),
    array('Search', 'search.php', 'icon-search'),
    array('Add Request', 'reservation_request.php', 'icon-pencil'),
    array('History', 'history.php', 'icon-list-alt')
  );
?>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="#">DinBenDon</a>
      <ul class="nav">
      <?php foreach ($list as $li): ?>
        <li<?php if($uri == $li[1]) {echo ' class="active"';} ?>>
          <a href="<?= $li[1] ?>">
          <?php if(isset($li[2])): ?><i class="<?= $li[2].' icon-white' ?>"></i><?php endif; ?><?= $li[0] ?></a>
        </li>
      <?php endforeach; ?>
      </ul>
      <ul class="nav pull-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?= isset($_SESSION['userName'])?$_SESSION['userName']:'Anonymouse' ?><b class="caret"></b></a>
          <ul class="dropdown-menu">
          <?php if(isset($_SESSION['uid'])): ?>
            <li><a href="user.php?id=<?= $_SESSION['uid'] ?>"><i class="icon-user"></i>Info</a></li>
            <li><a href="setting.php"><i class="icon-cog"></i>Setting</a></li>
          <?php if($_SESSION['usreType']): ?>
            <li><a href="#"><i class="icon-wrench"></i>Admin</a></li>
          <?php endif; ?>
            <li class="divider"></li>
            <li><a href="logout.php"><i class="icon-off"></i>Logout</a></li>
          <?php else: ?>
            <li><a href="login.php"><i class="icon-user"></i>Login</a></li>
            <li class="divider"></li>
            <li><a href="register.php"><i class="icon-plus"></i>Register</a></li>
          <?php endif; ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('.dropdown-toggle').dropdown();
</script>
