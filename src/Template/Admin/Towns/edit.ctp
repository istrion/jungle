<div class="btn-group">
    <button type="button" class="btn btn-info"><?= __('Actions') ?></button>
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Actions</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><?= $this->Html->link(__('Liste des villes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Liste des secteurs'), ['controller' => 'Secteurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nouveau secteur'), ['controller' => 'Secteurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List des biens'), ['controller' => 'Biens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nouveau Bien'), ['controller' => 'Biens', 'action' => 'add']) ?></li>
    </ul>
</div>

<hr />

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ajouter une nouvelle ville</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($town) ?>
    <div class="box-body">
        <div
            class="form-group col-lg-4 col-sm-4 col-sx-4">
            <?= $this->Form->input('title', ['class' => 'form-control', 'placeholder' => 'Indiquez un nom', 'label' => 'Nom']); ?>
        </div>
        <div
            class="form-group col-lg-4 col-sm-4 col-sx-4">
            <?= $this->Form->input('cp', ['class' => 'form-control', 'placeholder' => 'Indiquez un code postal', 'label' => 'Code postal']); ?>
        </div>
        <div
            class="form-group col-lg-4 col-sm-4 col-sx-4">
            <?=  $this->Form->input('secteur_id', ['options' => $secteurs, 'class' => 'form-control', 'placeholder' => 'Indiquez un titre', 'label' => 'Secteur']); ?>
        </div>
        <div
    </div>
    <p class="text-center"><?= $this->Form->button(__('Enregistrer'), ['class' => 'btn btn-primary']) ?></p>
    <?= $this->Form->end() ?>
</div>

