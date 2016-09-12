<div class="btn-group">
    <button type="button" class="btn btn-info"><?= __('Actions') ?></button>
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Menu</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><?= $this->Html->link(__('List Agents'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $agent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $agent->id)]
            )
            ?></li>
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
        <div
            class="form-group"><?= $this->Form->input('first_name', ['class' => 'form-control', 'placeholder' => 'Nom', 'label' => 'Nom']); ?></div>
        <div
            class="form-group"><?= $this->Form->input('last_name', ['class' => 'form-control', 'placeholder' => 'Prenom', 'label' => 'Prénom']); ?></div>
        <div
            class="form-group"><?= $this->Form->textarea('description', ['class' => 'form-control', 'placeholder' => 'description', 'label' => 'Description']); ?></div>
        <div
            class="form-group"><?= $this->Form->file('photo', ['class' => 'form-control', 'placeholder' => 'photo', 'label' => 'Photo']); ?></div>
    </div>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php echo $this->Html->script('/admin/js/tinymce/tinymce.min.js', ['block' => 'scriptBottom']); ?>
<?php $this->Html->scriptBlock("tinymce.init({ selector:'textarea',menubar: false});", ['block' => 'scriptBottom']); ?>


