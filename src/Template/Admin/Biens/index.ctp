<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bien'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Secteurs'), ['controller' => 'Secteurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Secteur'), ['controller' => 'Secteurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dpes'), ['controller' => 'Dpes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dpe'), ['controller' => 'Dpes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="biens index large-9 medium-8 columns content">
    <h3><?= __('Biens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th><?= $this->Paginator->sort('secteur_id') ?></th>
                <th><?= $this->Paginator->sort('ville_id') ?></th>
                <th><?= $this->Paginator->sort('room') ?></th>
                <th><?= $this->Paginator->sort('kitchen') ?></th>
                <th><?= $this->Paginator->sort('shower') ?></th>
                <th><?= $this->Paginator->sort('parking') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('dpe_id') ?></th>
                <th><?= $this->Paginator->sort('agent_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($biens as $bien): ?>
            <tr>
                <td><?= $this->Number->format($bien->id) ?></td>
                <td><?= h($bien->title) ?></td>
                <td><?= $this->Number->format($bien->price) ?></td>
                <td><?= $bien->has('secteur') ? $this->Html->link($bien->secteur->title, ['controller' => 'Secteurs', 'action' => 'view', $bien->secteur->id]) : '' ?></td>
                <td><?= $this->Number->format($bien->ville_id) ?></td>
                <td><?= $this->Number->format($bien->room) ?></td>
                <td><?= $this->Number->format($bien->kitchen) ?></td>
                <td><?= $this->Number->format($bien->shower) ?></td>
                <td><?= $this->Number->format($bien->parking) ?></td>
                <td><?= h($bien->description) ?></td>
                <td><?= $bien->has('dpe') ? $this->Html->link($bien->dpe->title, ['controller' => 'Dpes', 'action' => 'view', $bien->dpe->id]) : '' ?></td>
                <td><?= h($bien->agent_id) ?></td>
                <td><?= h($bien->created) ?></td>
                <td><?= h($bien->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bien->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bien->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bien->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bien->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
