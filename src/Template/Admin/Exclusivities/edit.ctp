<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exclusivity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exclusivity->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Exclusivities'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="exclusivities form large-9 medium-8 columns content">
    <?= $this->Form->create($exclusivity) ?>
    <fieldset>
        <legend><?= __('Edit Exclusivity') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('email');
            echo $this->Form->input('telephone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
