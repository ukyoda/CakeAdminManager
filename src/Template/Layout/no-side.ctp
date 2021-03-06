<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <title><?= $title ?></title>
        <?= $this->Html->css('/admin_manager/libs/bootstrap/dist/css/bootstrap.css')?>
        <?= $this->Html->css('/admin_manager/libs/AdminLTE/dist/css/AdminLTE.min.css')?>
        <?= $this->Html->css('/admin_manager/libs/AdminLTE/dist/css/skins/skin-green.min.css')?>
        <?= $this->Html->css('/admin_manager/libs/font-awesome/css/font-awesome.min.css')?>
        <?= $this->Html->css('/admin_manager/css/style.css')?>
        <?= $this->fetch('css')?>
    </head>
    <body>
        <div class="container">
            <?= $this->fetch('content') ?>
        </div>
        <?= $this->fetch('script')?>
    </body>
</html>
