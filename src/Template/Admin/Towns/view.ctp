<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Town'), ['action' => 'edit', $town->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Town'), ['action' => 'delete', $town->id], ['confirm' => __('Are you sure you want to delete # {0}?', $town->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Towns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Town'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Secteurs'), ['controller' => 'Secteurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Secteur'), ['controller' => 'Secteurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Biens'), ['controller' => 'Biens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bien'), ['controller' => 'Biens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="towns view large-9 medium-8 columns content">
    <h3><?= h($town->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($town->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Secteur') ?></th>
            <td><?= $town->has('secteur') ? $this->Html->link($town->secteur->title, ['controller' => 'Secteurs', 'action' => 'view', $town->secteur->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($town->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($town->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($town->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Biens') ?></h4>
        <?php if (!empty($town->biens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Secteur Id') ?></th>
                <th><?= __('Town Id') ?></th>
                <th><?= __('Room') ?></th>
                <th><?= __('Kitchen') ?></th>
                <th><?= __('Shower') ?></th>
                <th><?= __('Parking') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Dpe Id') ?></th>
                <th><?= __('Agent Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($town->biens as $biens): ?>
            <tr>
                <td><?= h($biens->id) ?></td>
                <td><?= h($biens->title) ?></td>
                <td><?= h($biens->price) ?></td>
                <td><?= h($biens->secteur_id) ?></td>
                <td><?= h($biens->town_id) ?></td>
                <td><?= h($biens->room) ?></td>
                <td><?= h($biens->kitchen) ?></td>
                <td><?= h($biens->shower) ?></td>
                <td><?= h($biens->parking) ?></td>
                <td><?= h($biens->description) ?></td>
                <td><?= h($biens->dpe_id) ?></td>
                <td><?= h($biens->agent_id) ?></td>
                <td><?= h($biens->created) ?></td>
                <td><?= h($biens->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Biens', 'action' => 'view', $biens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Biens', 'action' => 'edit', $biens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Biens', 'action' => 'delete', $biens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $biens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
