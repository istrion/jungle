<div class="btn-group">
    <button type="button" class="btn btn-info"><?= __('Actions') ?></button>
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><?= $this->Html->link(__('New Slider'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="margin-bottom"></div>

<div class="sliders index large-9 medium-8 columns content">
    <h3><?= __('Sliders') ?></h3>

    <ul id="list-img">
        <?php foreach ($sliders as $slider): ?>
        <li>
            <?= $this->Html->image($slider->path);?>
            <?= $this->Html->link('', ['action' => 'edit', $slider->id], ['class' => 'glyphicon glyphicon-edit view-btn']) ?>
            <?= $this->Form->postLink('', ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id), 'class' => 'glyphicon glyphicon-trash trash-btn']) ?>
        </li>
        <?php endforeach; ?>

    </ul>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
