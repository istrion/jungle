<div class="btn-group">
    <button type="button" class="btn btn-info"><?= __('Actions') ?></button>
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><?= $this->Html->link(__('Nouveau témoignage'), ['action' => 'add']) ?></li>
    </ul>
</div>
<hr />


<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste des témoignages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><?= $this->Paginator->sort('id') ?></th>
                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><?= $this->Paginator->sort('created') ?></th>
                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><?= $this->Paginator->sort('modified') ?></th>
                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1"><?= __('Actions') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($testimonies as $testimony): ?>
                                    <tr role="row" class="odd">


                                        <td><?= $this->Number->format($testimony->id) ?></td>
                                        <td><?= h($testimony->created) ?></td>
                                        <td><?= h($testimony->modified) ?></td>

                                        <td class="actions">
                                            <?= $this->Html->link('<i class="fa fa-edit"></i>' . __('Edit'),
                                                ['action' => 'edit', $testimony->id],
                                                ['class' => 'btn btn-app','escape' => false]) ?>
                                            <?= $this->Form->postLink('<i class="fa fa-trash"></i>'.__('Delete'),
                                                ['action' => 'delete', $testimony->id],
                                                ['confirm' => __('Are you sure you want to delete # {0}?', $testimony->id),
                                                    'class' => 'btn btn-app','escape' => false]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                <?= $this->Paginator->counter('Page {{page}} sur {{pages}}') ?></div>
                        </div>
                        <div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                <ul class="pagination">
                                    <?= $this->Paginator->prev('< ' . __('previous'), ['class' => 'paginate_button previous']) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('next') . ' >', ['class' => 'paginate_button_next']) ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>

<?php echo $this->Flash->render() ?>