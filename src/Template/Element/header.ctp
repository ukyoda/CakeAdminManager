<?php
$linkTop = $this->Html->link('管理画面', ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'logo']);
$linkLogout = $this->Html->link('<i class="fa fa-sign-out"></i>ログアウト',
  ['controller' => 'users', 'action' => 'logout'],
  ['escape' => false]);
?>
<?= $linkTop ?>
<nav class="navbar navbar-static-top" role="navigation">
  <div class="collapse navbar-collapse" id="navbar-collapse">
    <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">トグル</span>
    </a>
    <!-- 右に寄せるメニュ :navbar-rightとかもあるが、マージが無い -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li><?= $linkLogout ?></li>
      </ul>
    </div>
  </div>
</nav>
