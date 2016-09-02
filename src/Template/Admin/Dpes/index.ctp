<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dpe'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Biens'), ['controller' => 'Biens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bien'), ['controller' => 'Biens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dpes index large-9 medium-8 columns content">
    <h3><?= __('Dpes') ?></h3>
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
            <?php foreach ($dpes as $dpe): ?>
            <tr>
                <td><?= $this->Number->format($dpe->id) ?></td>
                <td><?= h($dpe->title) ?></td>
                <td><?= h($dpe->created) ?></td>
                <td><?= h($dpe->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dpe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dpe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dpe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dpe->id)]) ?>
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
