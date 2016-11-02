<div class="btn-group">
    <button type="button" class="btn btn-info"><?= __('Actions') ?></button>
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Actions</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><?= $this->Html->link(__('Liste des témoignages'), ['action' => 'index']) ?></li>
    </ul>
</div>

<hr />

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ajouter un nouveau témoignage</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($testimony) ?>
    <div class="box-body">
        <div
            class="form-group col-lg-12 col-sm-12 col-sx-12">
            <?= $this->Form->input('testimony', ['class' => 'form-control', 'placeholder' => 'Indiquez un nom', 'label' => 'Nom' , 'type' => 'textarea']); ?>
        </div>
        <div
    </div>
    <p class="text-center"><?= $this->Form->button(__('Enregistrer'), ['class' => 'btn btn-primary', 'formnovalidate' => true]) ?></p>
    <?= $this->Form->end() ?>
</div>


<?php echo $this->Html->script('/admin/js/tinymce/tinymce.min.js', ['block' => 'scriptBottom']); ?>
<?php $this->Html->scriptBlock("tinymce.init({ selector:'textarea',menubar: false});", ['block' => 'scriptBottom']); ?>
