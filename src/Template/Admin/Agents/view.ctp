<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Agent'), ['action' => 'edit', $agent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Agent'), ['action' => 'delete', $agent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Agents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agent'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Biens'), ['controller' => 'Biens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bien'), ['controller' => 'Biens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="agents view large-9 medium-8 columns content">
    <h3><?= h($agent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($agent->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($agent->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($agent->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($agent->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($agent->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($agent->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($agent->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Biens') ?></h4>
        <?php if (!empty($agent->biens)): ?>
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
            <?php foreach ($agent->biens as $biens): ?>
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
