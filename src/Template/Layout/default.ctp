<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <title><?=$title?></title>
        <?= $this->Html->css('/admin_manager/libs/bootstrap/dist/css/bootstrap.css')?>
        <?= $this->Html->css('/admin_manager/libs/AdminLTE/dist/css/AdminLTE.min.css')?>
        <?= $this->Html->css('/admin_manager/libs/AdminLTE/dist/css/skins/skin-green.min.css')?>
        <?= $this->Html->css('/admin_manager/libs/font-awesome/css/font-awesome.min.css')?>
        <?= $this->fetch('css')?>
    </head>
    <body class="skin-green">
        <div class="wrapper">
            <header class="main-header">
                <?= $this->element('AdminManager.header') ?>
            </header>

            <!-- サイドバー -->
            <?= $this->element('AdminManager.sidemenu') ?>

            <div class="content-wrapper">
                <section class="content">
                    <?= $this->fetch('content') ?>
                </section>
            </div>
            <?= $this->Html->script('/admin_manager/libs/jquery/dist/jquery.min.js') ?>
            <?= $this->Html->script('/admin_manager/libs/bootstrap/dist/js/bootstrap.min.js') ?>
            <?= $this->Html->script('/admin_manager/libs/AdminLTE/dist/js/app.min.js') ?>
            <?= $this->fetch('script')?>
        </div>
    </body>
</html>
