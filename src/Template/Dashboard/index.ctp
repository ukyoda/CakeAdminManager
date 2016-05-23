<div class="row">
  <div class="col-md-4 col-sm-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?= $userCount ?></h3>
        <p><?= __('ユーザ数') ?></p>
      </div>
      <div class="icon">
        <i class="fa fa-user-plus"></i>
      </div>
      <?= $this->Html->link('詳しく表示 <i class="fa fa-arrow-circle-o-right"></i>',
        ['controller' => 'users', 'action' => 'index'],
        ['class' => 'small-box-footer', 'escape' => false])
      ?>
    </div>
  </div>

  <div class="col-md-4 col-sm-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>33</h3>
        <p><?= __('グループ数') ?></p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <?= $this->Html->link('詳しく表示 <i class="fa fa-arrow-circle-o-right"></i>', [], ['class' => 'small-box-footer', 'escape' => false]) ?>
    </div>
  </div>

</div>
