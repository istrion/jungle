<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>JunGle Immobilier</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= __("Merci de rentrer vos nom d'utilisateur et mot de passe") ?></p>
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create() ?>
            <div class="form-group has-feedback">

                <?= $this->Form->input('username', ['class'=>"form-control", 'label' => false, 'placeholder' => "Nom d'utilisateur"]) ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?= $this->Form->input('password', ['class'=>"form-control", 'label' => false, 'placeholder' => "Mot de passe"]) ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <?= $this->Form->button(__('Se Connecter'),['class' => 'btn btn-primary btn-block btn-flat']); ?>
                </div>
                <!-- /.col -->
            </div>
        <?= $this->Form->end() ?>
    </div>
    <!-- /.login-box-body -->
</div>