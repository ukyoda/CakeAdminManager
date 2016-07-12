<div class="form-login">
    <div class="row">
        <div class="col-xs-12">
            <h1><?= __('ログイン') ?></h1>
            <?= $this->Flash->render() ?>
            <?= $this->Form->create('post') ?>
            <fieldset class="form-group">
                <?= $this->Form->input('screen_name');?>
            </fieldset>
            <fieldset class="form-group">
                <?= $this->Form->input('password');?>
            </fieldset>
            <?= $this->Form->button(__('ログイン'), ['class' => ['btn-primary', 'col-xs-12']]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
