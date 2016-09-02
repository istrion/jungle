<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Secteur'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Biens'), ['controller' => 'Biens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bien'), ['controller' => 'Biens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Towns'), ['controller' => 'Towns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Town'), ['controller' => 'Towns', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="secteurs index large-9 medium-8 columns content">
    <h3><?= __('Secteurs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($secteurs as $secteur): ?>
            <tr>
                <td><?= $this->Number->format($secteur->id) ?></td>
                <td><?= h($secteur->title) ?></td>
                <td><?= h($secteur->created) ?></td>
                <td><?= h($secteur->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $secteur->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $secteur->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $secteur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $secteur->id)]) ?>
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
