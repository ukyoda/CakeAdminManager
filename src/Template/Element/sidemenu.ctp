<?php
  $context = $this;
  // 現在表示されているページかどうか
  function isActive($context, $controllerName, $actionName = null) {
    $flg1 = ($context->name === $controllerName);
    $flg2 = ($actionName === null || $actionName === $context->request->action) ? true: false;
    return ($flg1 && $flg2)?'active':'';
  }

  $dashboard = $this->Html->link('<i class="fa fa-dashboard"></i>Dashboard',
    ['controller' => 'dashboard', 'action' => 'index'],
    ['escape' => false]
  );
  $pfEdit = $this->Html->link('<i class="fa fa-user"></i>Users',
    ['controller' => 'users', 'action' => 'index'],
    ['escape' => false]);
  $bkEdit = $this->Html->link('<i class="fa fa-users"></i>Groups',
    ['controller' => 'bookmarks', 'action' => 'add'],
    ['escape' => false]);
?>
<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <!-- メニューヘッダ -->
      <li class="header">MENU</li>
      <!-- メニュー項目 -->
      <li class="<?= isActive($this, 'Dashboard') ?>">
        <?= $dashboard ?>
      </li>
      <li class="<?= isActive($this, 'Users') ?>">
        <?= $pfEdit ?>
      </li>
      <li class="<?= isActive($this, 'Bookmarks') ?>">
        <?= $bkEdit ?>
      </li>
    </ul>
  </section>
</aside>
