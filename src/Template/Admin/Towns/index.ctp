<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Town'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Secteurs'), ['controller' => 'Secteurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Secteur'), ['controller' => 'Secteurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Biens'), ['controller' => 'Biens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bien'), ['controller' => 'Biens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="towns index large-9 medium-8 columns content">
    <h3><?= __('Towns') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('secteur_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($towns as $town): ?>
            <tr>
                <td><?= $this->Number->format($town->id) ?></td>
                <td><?= h($town->title) ?></td>
                <td><?= $town->has('secteur') ? $this->Html->link($town->secteur->title, ['controller' => 'Secteurs', 'action' => 'view', $town->secteur->id]) : '' ?></td>
                <td><?= h($town->created) ?></td>
                <td><?= h($town->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $town->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $town->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $town->id], ['confirm' => __('Are you sure you want to delete # {0}?', $town->id)]) ?>
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
