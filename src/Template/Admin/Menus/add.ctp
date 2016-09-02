<div class="btn-group">
    <button type="button" class="btn btn-info"><?= __('Actions') ?></button>
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li>
            <?= $this->Html->link(__('List Menus'), ['action' => 'index']) ?>
        </li>

        <li><?= $this->Html->link(__('List Parent Menus'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Menu'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="margin-bottom"></div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ajouter un nouveau menu</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($menu) ?>
        <div class="box-body">
            <div class="form-group">
                <?= $this->Form->label('Menu parent'); ?>

                <?php echo $this->Form->select('parent_id', $parentMenus, ['empty' => '(Pas de parent)', 'class' => 'form-control']); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('title', ['class' => 'form-control', 'placeholder' => 'Indiquez un titre', 'label' => 'Titre']); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('url', ['class' => 'form-control', 'placeholder' => 'Indiquez un lien', 'label' => 'Lien']); ?>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <?= $this->Form->button(__('Enregistrer'),["class" => "btn btn-primary"]) ?>
        </div>
    <?= $this->Form->end() ?>
</div>