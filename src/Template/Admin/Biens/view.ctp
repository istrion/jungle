<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bien'), ['action' => 'edit', $bien->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bien'), ['action' => 'delete', $bien->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bien->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Biens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bien'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Secteurs'), ['controller' => 'Secteurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Secteur'), ['controller' => 'Secteurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dpes'), ['controller' => 'Dpes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dpe'), ['controller' => 'Dpes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="biens view large-9 medium-8 columns content">
    <h3><?= h($bien->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($bien->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Secteur') ?></th>
            <td><?= $bien->has('secteur') ? $this->Html->link($bien->secteur->title, ['controller' => 'Secteurs', 'action' => 'view', $bien->secteur->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($bien->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Dpe') ?></th>
            <td><?= $bien->has('dpe') ? $this->Html->link($bien->dpe->title, ['controller' => 'Dpes', 'action' => 'view', $bien->dpe->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Agent Id') ?></th>
            <td><?= h($bien->agent_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($bien->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($bien->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Ville Id') ?></th>
            <td><?= $this->Number->format($bien->ville_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Room') ?></th>
            <td><?= $this->Number->format($bien->room) ?></td>
        </tr>
        <tr>
            <th><?= __('Kitchen') ?></th>
            <td><?= $this->Number->format($bien->kitchen) ?></td>
        </tr>
        <tr>
            <th><?= __('Shower') ?></th>
            <td><?= $this->Number->format($bien->shower) ?></td>
        </tr>
        <tr>
            <th><?= __('Parking') ?></th>
            <td><?= $this->Number->format($bien->parking) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($bien->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($bien->modified) ?></td>
        </tr>
    </table>
</div>
