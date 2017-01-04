<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exclusivity'), ['action' => 'edit', $exclusivity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exclusivity'), ['action' => 'delete', $exclusivity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exclusivity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exclusivities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exclusivity'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="exclusivities view large-9 medium-8 columns content">
    <h3><?= h($exclusivity->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($exclusivity->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($exclusivity->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Telephone') ?></th>
            <td><?= h($exclusivity->telephone) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($exclusivity->id) ?></td>
        </tr>
    </table>
</div>
