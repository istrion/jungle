<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $town->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $town->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Towns'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Secteurs'), ['controller' => 'Secteurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Secteur'), ['controller' => 'Secteurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Biens'), ['controller' => 'Biens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bien'), ['controller' => 'Biens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="towns form large-9 medium-8 columns content">
    <?= $this->Form->create($town) ?>
    <fieldset>
        <legend><?= __('Edit Town') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('secteur_id', ['options' => $secteurs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
