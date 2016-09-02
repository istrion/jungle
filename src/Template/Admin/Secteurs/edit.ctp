<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $secteur->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $secteur->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Secteurs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Biens'), ['controller' => 'Biens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bien'), ['controller' => 'Biens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Towns'), ['controller' => 'Towns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Town'), ['controller' => 'Towns', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="secteurs form large-9 medium-8 columns content">
    <?= $this->Form->create($secteur) ?>
    <fieldset>
        <legend><?= __('Edit Secteur') ?></legend>
        <?php
            echo $this->Form->input('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
