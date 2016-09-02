<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Secteur'), ['action' => 'edit', $secteur->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Secteur'), ['action' => 'delete', $secteur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $secteur->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Secteurs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Secteur'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Biens'), ['controller' => 'Biens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bien'), ['controller' => 'Biens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Towns'), ['controller' => 'Towns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Town'), ['controller' => 'Towns', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="secteurs view large-9 medium-8 columns content">
    <h3><?= h($secteur->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($secteur->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($secteur->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($secteur->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($secteur->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Biens') ?></h4>
        <?php if (!empty($secteur->biens)): ?>
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
            <?php foreach ($secteur->biens as $biens): ?>
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
    <div class="related">
        <h4><?= __('Related Towns') ?></h4>
        <?php if (!empty($secteur->towns)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Secteur Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($secteur->towns as $towns): ?>
            <tr>
                <td><?= h($towns->id) ?></td>
                <td><?= h($towns->title) ?></td>
                <td><?= h($towns->secteur_id) ?></td>
                <td><?= h($towns->created) ?></td>
                <td><?= h($towns->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Towns', 'action' => 'view', $towns->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Towns', 'action' => 'edit', $towns->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Towns', 'action' => 'delete', $towns->id], ['confirm' => __('Are you sure you want to delete # {0}?', $towns->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
