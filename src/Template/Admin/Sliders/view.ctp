<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Slider'), ['action' => 'edit', $slider->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Slider'), ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sliders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Slider'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sliders view large-9 medium-8 columns content">
    <h3><?= h($slider->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Path') ?></th>
            <td><?= h($slider->path) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($slider->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($slider->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($slider->modified) ?></td>
        </tr>
    </table>
</div>
