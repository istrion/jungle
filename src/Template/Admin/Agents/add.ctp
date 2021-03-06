<div class="btn-group">
    <button type="button" class="btn btn-info"><?= __('Actions') ?></button>
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Menu</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><?= $this->Html->link(__('List Agents'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="margin-bottom"></div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ajouter un nouvel agent</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($agent, array('type' => 'file')) ?>
    <div class="box-body">
        <div class="form-group">
            <div class="form-group col-lg-6 col-sm-6 col-sx-6">
                <?= $this->Form->input('first_name', ['class' => 'form-control', 'placeholder' => 'Nom', 'label' => 'Nom']); ?>
            </div>
            <div class="form-group col-lg-6 col-sm-6 col-sx-6">
                <?= $this->Form->input('last_name', ['class' => 'form-control', 'placeholder' => 'Prenom', 'label' => 'Prénom']); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group col-lg-6 col-sm-6 col-sx-6">
                <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'Email', 'label' => 'Email']); ?>
            </div>
            <div class="form-group col-lg-6 col-sm-6 col-sx-6">
                <?= $this->Form->input('tel', ['class' => 'form-control', 'placeholder' => 'Téléphone', 'label' => 'Téléphone']); ?>
            </div>
        </div>

        <div
            class="form-group col-lg-12 col-sm-12 col-sx-12"><?= $this->Form->textarea('description', ['class' => 'form-control', 'placeholder' => 'description', 'label' => 'Description', 'required' => 'false']); ?></div>
        <div
            class="form-group"><?= $this->Form->file('photo', ['class' => 'form-control', 'placeholder' => 'photo', 'label' => 'Photo']); ?></div>
    </div>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php echo $this->Html->script('/admin/js/tinymce/tinymce.min.js', ['block' => 'scriptBottom']); ?>
<?php $this->Html->scriptBlock("tinymce.init({ selector:'textarea',menubar: false});", ['block' => 'scriptBottom']); ?>

