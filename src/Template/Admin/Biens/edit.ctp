<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bien->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bien->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Biens'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Secteurs'), ['controller' => 'Secteurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Secteur'), ['controller' => 'Secteurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dpes'), ['controller' => 'Dpes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dpe'), ['controller' => 'Dpes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="biens form large-9 medium-8 columns content">
    <?= $this->Form->create($bien) ?>
    <fieldset>
        <legend><?= __('Edit Bien') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('price');
            echo $this->Form->input('secteur_id', ['options' => $secteurs]);
            echo $this->Form->input('ville_id');
            echo $this->Form->input('room');
            echo $this->Form->input('kitchen');
            echo $this->Form->input('shower');
            echo $this->Form->input('parking');
            echo $this->Form->input('description');
            echo $this->Form->input('dpe_id', ['options' => $dpes]);
            echo $this->Form->input('agent_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
