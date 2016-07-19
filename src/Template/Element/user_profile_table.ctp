
<ul class="list-group list-group-unbordered">
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <b>Name</b>
            </div>
            <div class="col-md-9 col-sm-12">
                <?= $user->name ?>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <b>Mail Address</b>
            </div>
            <div class="col-md-9 col-sm-12">
                <?= $user->mail_address ?>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <b>Login Name</b>
            </div>
            <div class="col-md-9 col-sm-12">
                <?= $user->login_name ?>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <b>User Role</b>
            </div>
            <div class="col-md-9 col-sm-12">
                <?= $user->role_mst->name ?>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <b>Admin Flg</b>
            </div>
            <div class="col-md-9 col-sm-12">
                <?= $user->admin_flg? '<span class="glyphicon glyphicon-ok text-green"></span>': '<span class="glyphicon glyphicon-remove text-red"></span>';?>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <b>Status</b>
            </div>
            <div class="col-md-9 col-sm-12">
                <?= $user->status==0?'<span class="label label-danger">使用不可</span>':'<span class="label label-success">使用可能</span>' ?>
            </div>
        </div>
    </li>
</ul>
