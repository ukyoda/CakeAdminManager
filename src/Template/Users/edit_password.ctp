<div class="box box-solid box-default">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-user"></i> <?= $title ?></h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($user) ?>
                <fieldset class="form-group">
                    <?= $this->Form->input('password', ['class' => 'form-control']) ?>
                </fieldset>
                <fieldset class="form-group">
                    <?= $this->Form->input('confirm_password', ['type' => 'password', 'class' => 'form-control']) ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => ['btn btn-primary']]) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
