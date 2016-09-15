<div class="btn-group">
    <button type="button" class="btn btn-info"><?= __('Actions') ?></button>
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><?= $this->Html->link(__('List Sliders'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="margin-bottom"></div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Editer l'image</h3>
    </div>
    <!-- /.box-header -->
    <ul id="list-img">
            <li>
                <?= $this->Html->image($slider->path);?>
                <?= $this->Form->postLink('', ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id), 'class' => 'glyphicon glyphicon-trash trash-btn']) ?>
            </li>
    </ul>

    <!-- form start -->
    <?= $this->Form->create($slider, array('type' => 'file')) ?>
    <div class="box-body">
        <div class="form-group">
            <?= $this->Form->label('Changer l\'image'); ?>

            <?php echo $this->Form->file('path'); ?>
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Enregistrer'),["class" => "btn btn-primary"]) ?>
    </div>
    <?= $this->Form->end() ?>
</div>