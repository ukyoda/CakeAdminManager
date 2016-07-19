<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">
            ユーザ一覧
        </h3>
    </div>
    <div class="box-body">
        <p>
            <?= $this->Html->link(
                '<i class="fa fa-plus"></i> 新規ユーザ作成',
                ['action' => 'create'],
                ['class' => 'btn btn-info', 'escape' => false])
            ?>
        </p>
        <?= $this->Flash->render() ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('login_name') ?></th>
                    <th><?= $this->Paginator->sort('mail_address') ?></th>
                    <th><?= $this->Paginator->sort('role_mst_id') ?></th>
                    <th><?= $this->Paginator->sort('admin_flg') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('create_time') ?></th>
                    <th><?= $this->Paginator->sort('update_time') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->name) ?></td>
                    <td><?= h($user->login_name) ?></td>
                    <td><?= h($user->mail_address) ?></td>
                    <td><?= h($user->role_mst->name) ?></td>
                    <td><?= $user->admin_flg? '<span class="glyphicon glyphicon-ok text-green"></span>': '<span class="glyphicon glyphicon-remove text-red"></span>';?></td>
                    <td><?= $user->status==0? '<span class="label label-danger">使用不可</span>': '<span class="label label-success">使用可</span>';?></td>
                    <td><?= h($user->create_time) ?></td>
                    <td><?= h($user->update_time) ?></td>
                    <td>
                        <?= $this->Html->link('View', ['action' => 'view', 'id' => $user->id], ['class' => 'btn btn-default btn-xs']) ?>
                        <?= $this->Html->link('Delete', ['action' => 'delete', 'id' => $user->id], ['class' => 'btn btn-danger btn-xs']) ?>
                    </td>
                </tr>
                <?PHP endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
</div>
