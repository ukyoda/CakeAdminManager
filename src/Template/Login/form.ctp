<div class="form-login">
    <div class="row">
        <div class="col-xs-12">
            <h1><?= __('ログイン') ?></h1>
            <?= $this->Flash->render() ?>
            <?= $this->Form->create('post') ?>
            <fieldset class="form-group">
                <?= $this->Form->input('login_name', ['class' => 'form-control']);?>
            </fieldset>
            <fieldset class="form-group">
                <?= $this->Form->input('password', ['class' => 'form-control']);?>
            </fieldset>
            <?= $this->Form->button(__('ログイン'), ['class' => 'btn btn-primary col-xs-12']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
