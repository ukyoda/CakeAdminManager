<div class="box box-default box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-user"></i> <?= $user->name ?></h3>
    </div>
    <div class="box-body">
        <p>
            <?= $this->Html->link(
                '<i class="fa fa-arrow-left"></i>戻る',
                ['action' => 'index'],
                ['class' => 'btn btn-default', 'escape' => false])
            ?>
            <?= $this->Html->link(
                '<i class="fa fa-edit"></i> プロフィール編集',
                ['action' => 'edit', 'id' => $user->id],
                ['class' => 'btn btn-default', 'escape' => false])
            ?>
            <?= $this->Html->link(
                '<i class="fa fa-lock"></i> パスワード変更',
                ['action' => 'edit-password', 'id' => $user->id],
                ['class' => 'btn btn-default', 'escape' => false])
            ?>
        </p>
        <?= $this->Flash->render() ?>
        <?= $this->element('user_profile_table', ['user' => $user]); ?>
    </div>
</div>
