<div class="box box-default box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">アカウントの削除</h3>
    </div>
    <div class="box-body">
        <div class="alert alert-danger">
            下記のユーザを削除します。
            <ul>
                <li>この操作はDBからユーザを完全に消去しますのでご注意ください</li>
                <li>アカウントの停止には<?= $this->Html->link('こちら', ['action' => 'edit', 'id' => $user->id])?>より利用不可設定に変更してください</li>
        </div>
        <p>
            <div>
                <?= $this->Html->link(
                    '<i class="fa fa-arrow-left"></i>戻る',
                    ['action' => 'index'],
                    ['class' => 'btn btn-default', 'escape' => false])
                ?>
                <?= $this->Form->postLink(
                    __('同意の上削除する'),
                    ['action' => 'delete', $user->id],
                    [
                        'confirm' => '本当に削除してよろしいですか？',
                        'class' => 'btn btn-danger'
                    ])
                ?>
            </div>
        </p>
        <?= $this->Flash->render() ?>
        <?= $this->element('user_profile_table', ['user' => $user]); ?>
    </div>
</div>
