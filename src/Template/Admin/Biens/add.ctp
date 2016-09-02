<div class="btn-group">
    <button type="button" class="btn btn-info"><?= __('Actions') ?></button>
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><?= $this->Html->link(__('List Biens'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="margin-bottom"></div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ajouter un nouveau bien</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($bien) ?>
    <div class="box-body">
        <div class="form-group"><?= $this->Form->input('title', ['class' => 'form-control', 'placeholder' => 'Indiquez un titre', 'label' => 'Titre']);?></div>
        <div class="form-group"><?= $this->Form->input('price', ['class' => 'form-control', 'placeholder' => 'Indiquez un prix', 'label' => 'Prix']);?></div>
        <div class="form-group">
            <?= $this->Form->label('Secteurs'); ?>
            <?= $this->Form->select('secteur_id', $secteurs, ['empty' => '(Sélectionnez un secteur)', 'class' => 'form-control']);?></div>
        <div class="form-group">
            <?= $this->Form->label('Villes'); ?>
            <?= $this->Form->select('town_id', $towns,['empty' => '(Sélectionnez une ville)', 'class' => 'form-control']);?></div>
        <div class="form-group"><?= $this->Form->input('room', ['class' => 'form-control', 'placeholder' => 'Indiquez le nombre de chambre', 'label' => 'Chambres']);?></div>
        <div class="form-group"><?= $this->Form->input('kitchen', ['class' => 'form-control', 'placeholder' => 'Indiquez le nombre de cuisines', 'label' => 'Cuisines']);?></div>
        <div class="form-group"><?= $this->Form->input('shower', ['class' => 'form-control', 'placeholder' => 'Indiquez le nombre de salles de bain', 'label' => 'Salle de bains']);?></div>
        <div class="form-group"><?= $this->Form->input('parking', ['class' => 'form-control', 'placeholder' => 'Indiquez le nombre de parking', 'label' => 'Parkings']);?></div>
        <div class="form-group"><?= $this->Form->input('description', ['class' => 'form-control', 'placeholder' => 'Indiquez une description', 'label' => 'Description']);?></div>
        <div class="form-group">
            <?= $this->Form->label('Dpe'); ?>
            <?= $this->Form->select('dpe_id', $dpes, ['empty' => '(Sélectionnez un dpe)', 'class' => 'form-control']);?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('Agents'); ?>
            <?= $this->Form->select('agent_id', $agents,['empty' => '(Sélectionnez un agent)', 'class' => 'form-control']);?></div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Enregistrer'),["class" => "btn btn-primary"]) ?>
    </div>
    <?= $this->Form->end() ?>
</div>